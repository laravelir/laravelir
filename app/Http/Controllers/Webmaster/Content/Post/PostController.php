<?php

namespace App\Http\Controllers\Webmaster\Content\Post;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Post;
use App\Models\Freelancer;
use App\Enum\OrderTypeEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Enum\TicketStatusEnum;
use App\Enum\PostDoTypeEnum;
use App\Enum\TicketPriorityEnum;
use Illuminate\Support\Facades\DB;
use App\Enum\PostStatusEnum;
use App\Http\Controllers\Controller;
use App\Enum\ContentPostStatusEnum;
use App\Events\Shared\Ticket\SendNewTicketEvent;
use App\Events\Site\Content\ContentOrderApprovedEvent;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(8);
        return view('webmaster.content.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::active()->get();
        $tags = Tag::active()->get();
        $authors = User::get();

        return view('webmaster.content.posts.create', compact('authors', 'categories', 'tags'));
    }

    public function store(Request $request)
    {
        $post = Post::create(array_merge(
            $request->except(['active', 'thumbnail_path', 'tags']),
            ['active' => $request->has('active') ? true : false,]
        ));

        $tags = collect($request->tags);
        $tags->each(function ($i) use ($post){
           DB::table('taggables')->insert([
            'tag_id' => $i,
            'taggable_id' => $post->id,
            'taggable_type' => get_class($post),
           ]);
        });



        return redirect()->route('webmaster.posts.index')->with('toast_success', __('messages.posts.created'));
    }

    public function show(Post $post)
    {
        return view('webmaster.content.posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }

    public function approve(Request $request, Post $order)
    {
        $order->update([
            'approved' => 1,
            'status' => PostStatusEnum::APPROVED,
        ]);

        if ($order->type_of_do_post == PostDoTypeEnum::BY_RASA) {

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
        $proj = Post::where('id', $order_id)->first();

        DB::transaction(function () use ($proj, $request) {
            $proj->update([
                'approved' => 0,
                'status' => ContentPostStatusEnum::REJECTED,
            ]);

            $ticket = Ticket::create([
                'admin_id' => user()->id,
                'subject_id' => 3,
                'post_id' => $proj->id,
                'post_type' => OrderTypeEnum::CONTENT,
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

    public function downloadContentAttachment($attachment)
    {
        $a = DB::table('post_attachments')->find($attachment);

        return response()->download($a->path);
    }
}
