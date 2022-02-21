<?php

namespace App\Http\Controllers\Webmaster\Project;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Project;
use Webpatser\Uuid\Uuid;
use App\Enum\CurrencyEnum;
use App\Models\Freelancer;
use App\Enum\AuthGuardEnum;
use App\Enum\OrderTypeEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Enum\TicketStatusEnum;
use App\Enum\ProjectDoTypeEnum;
use App\Enum\TicketPriorityEnum;
use Illuminate\Support\Facades\DB;
use App\Enum\ContentOrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Enum\ContentProjectStatusEnum;
use App\Events\Shared\Ticket\SendNewTicketEvent;
use App\Events\Site\Content\ContentOrderApprovedEvent;
use App\Notifications\Shared\Content\ContentOrderDisapprovedNotification;
use App\Notifications\Shared\Content\ContentOrderToFreelancersNotification;
use App\Notifications\Shared\Content\ContentAttachmentDisapprovedNotification;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('webmaster.projects.index', compact('projects',));
    }

    public function show(Project $project)
    {
        $freelancers = Freelancer::get();

        return view('webmaster.projects.show', compact('project', 'freelancers'));
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }

    public function approve(Request $request, Project $order)
    {
        $order->update([
            'approved' => 1,
            'status' => ContentOrderStatusEnum::IN_PROGRESS,
        ]);

        if ($order->type_of_do_project == ProjectDoTypeEnum::BY_RASA) {

            $details = [
                'orderType' => OrderTypeEnum::CONTENT,
                'order' => $order,
                'customer' => $order->user,
            ];

            event(new ContentOrderApprovedEvent($details));

            return response()->json([
                'message' => 'سفارش محتوا با موفقیت تایید شد',
            ], Response::HTTP_OK);
        } else {
            $freelancers = Freelancer::whereIn('categories', $order->category_id)->get();
            $details = [
                'orderType' => OrderTypeEnum::CONTENT,
                'customer' => $order->user,
            ];
            foreach ($freelancers as $freelancer) {
                $freelancer->notify(new ContentOrderToFreelancersNotification($details));
            }
        }

        return response()->json([
            'message' => 'سفارش محتوا با موفقیت تایید شد',
        ], Response::HTTP_OK);
    }

    public function disapprove(Request $request, $order_id)
    {
        $proj = Project::where('id', $order_id)->first();

        DB::transaction(function () use ($proj, $request){
            $proj->update([
                'approved' => 0,
                'status' => ContentProjectStatusEnum::REJECTED,
            ]);

            $ticket = Ticket::create([
                'admin_id' => user()->id,
                'subject_id' => 3,
                'project_id' => $proj->id,
                'project_type' => OrderTypeEnum::CONTENT,
                'ticketable_id' => $proj->user_id,
                'ticketable_type' => User::class,
                'title' => $request->title,
                'body' => $request->body,
                'status' => TicketStatusEnum::NEW,
                'priority' => TicketPriorityEnum::EMERGENCY,
                'is_admin' => 1,
            ]);

            $details = [
                'user_type' => 'user',
                'user' => $ticket->ticketable,
                'title' => $ticket->title,
                'type' => 'ticket',
            ];

            event(new SendNewTicketEvent($details));

        });

        $user = User::find($proj->user_id);
        $details = [
            'orderType' => OrderTypeEnum::CONTENT,
            'order' => $proj,
            'customer' => $user,
        ];
        $user->notify(new ContentOrderDisapprovedNotification($details));

        return response()->json([
            'message' => 'سفارش محتوا با موفقیت رد شد',
        ], Response::HTTP_OK);
    }

    public function changeFreelancer(Request $request, Project $order)
    {

        $freelancer = Freelancer::find($request->freelancer_id);

        $order->update([
            'status' => ContentOrderStatusEnum::IN_PROGRESS,
            'freelancer_id' => $freelancer->id
        ]);

        DB::table('project_freelancer_requests')->where('project_id', $order->id)->update([
            'approved' => false
        ]);

        $details = [
            'order' => $order,
            'freelancer' => $freelancer,
        ];
        $freelancer->notify(new ContentOrderToFreelancersNotification($details));

        return response()->json([
            'message' => 'سفارش محتوا با موفقیت بسته شد',
        ], Response::HTTP_OK);
    }

    public function assignToFreelancer($project_id, $freelancer_id)
    {
        $project = Project::find($project_id);
        $freelancer = Freelancer::find($freelancer_id);
        $project->update([
            'status' => ContentOrderStatusEnum::IN_PROGRESS,
            'freelancer_id' => $freelancer->id
        ]);

        DB::table('project_freelancer_requests')
            ->where('project_id', $project->id)
            ->where('freelancer_id', $freelancer->id)->update([
                'approved' => true
            ]);

        $details = [
            'project' => $project,
            'freelancer' => $freelancer,
        ];
        $freelancer->notify(new ContentOrderToFreelancersNotification($details));

        return redirect()->back()->with([
            'message' => 'به فریلنسر تخصیص یافت',
            'type' => 'success'
        ]);;
    }

    public function approveAttachment(Project $order, $attachment)
    {

        DB::table('project_attachments')->where('project_id', $order->id)
            ->where('id', $attachment)->update([
                'approved' => true,
                'disapproved' => false,
            ]);

        return redirect()->back()->with([
            'message' => 'فایل تایید شد',
            'type' => 'success'
        ]);;
    }

    public function disapproveAttachment(Request $request, Project $order)
    {
        DB::table('project_attachments')->where('project_id', $order->id)
            ->where('id', $request->attachment_id)->update([
                'approved' => false,
                'disapproved' => true,
                'customer_disapproved' => false,
                'customer_approved' => false,
            ]);


        Ticket::create([
            'admin_id' => user()->id,
            'subject_id' => 3,
            'project_id' => $order->id,
            'project_type' => OrderTypeEnum::CONTENT,
            'ticketable_id' => $order->freelancer_id,
            'ticketable_type' => Freelancer::class,
            'title' => $request->title,
            'body' => $request->body,
            'status' => TicketStatusEnum::NEW,
            'priority' => TicketPriorityEnum::EMERGENCY,
            'is_admin' => 1,
        ]);

        $freelancer = getFreelancer($order->freelancer_id);

        $details = [
            'customer' => $freelancer,
        ];

        $freelancer->notify(new ContentAttachmentDisapprovedNotification($details));


        return redirect()->back()->with([
            'message' => 'فایل رد شد',
            'type' => 'success'
        ]);;
    }

    public function storeAttachment(Request $request, Project $project)
    {
        $path = $this->uploadOneFile($request->file('file'), 'projects/attachments');

        $project = DB::table('project_attachments')->insert([
            'uuid' => (string)Uuid::generate(4),
            'url' => asset($path),
            'path' => $path,
            'freelancer_id' => $project->freelancer_id,
            'project_id' => $project->id,
            'number' => $request->number,
            'created_at' => now()
        ]);;

        return redirect()->back()->with([
            'message' => 'فایل اپلود شد',
            'type' => 'success'
        ]);;
    }

    public function adminDone(Project $project)
    {
        if ($project->isProjectDone()) {
            $project->update([
                'customer_done' => true,
                'admin_done' => true,
                'status' => ContentOrderStatusEnum::DONE,
                'done_at' => now()
            ]);

            $freelancer  = $project->freelancer;

            if ($project->currency == CurrencyEnum::TOMAN) {
                $freelancer->wallet()->update([
                    'amount' => getFreelancerFinalProjectPrice($freelancer->id, $project->price)
                ]);
            } else {
                $freelancer->wallet()->update([
                    'dollar_amount' => getFreelancerFinalProjectPrice($freelancer->id, $project->price)
                ]);
            }

            return redirect()->back()->with([
                'message' => 'پروژه بسته شد تشکر',
                'type' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'پروژه به مرحله پایان نرسیده است',
            'type' => 'error'
        ]);
    }

    public function downloadContentAttachment($attachment)
    {
        $a = DB::table('project_attachments')->find($attachment);

        return response()->download($a->path);
    }
}
