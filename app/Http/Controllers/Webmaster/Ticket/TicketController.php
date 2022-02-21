<?php

namespace App\Http\Controllers\Webmaster\Ticket;

use App\Models\User;
use App\Models\Ticket;
use App\Enum\AuthGuardEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Enum\TicketStatusEnum;
use App\Events\Shared\Ticket\SendNewTicketEvent;
use App\Http\Controllers\Webmaster\WebmasterController;
use App\Models\Freelancer;

class TicketController extends WebmasterController
{

    public function index()
    {
        $tickets = Ticket::where('is_reply', 0)->latest()->get();
        return view('webmaster.tickets.tickets.index', compact('tickets'));
    }

    public function show(Ticket $ticket)
    {
        return view('webmaster.tickets.tickets.show', compact('ticket'));
    }

    public function create()
    {
        $users = User::get();
        return view('webmaster.tickets.tickets.create', compact('users'));
    }

    public function reply(Request $request, Ticket $ticket)
    {
        $user = auth(AuthGuardEnum::USER)->user();

        $ticket->update([
            'status' => TicketStatusEnum::WAIT_FOR_USER,
        ]);

        $replayTicket = Ticket::create([
            'body'            => $request->body,
            'parent_id'       => $ticket->id,
            'admin_id'        => $user->id,
            'ticketable_id'   => $ticket->ticketable_id,
            'ticketable_type' => $ticket->ticketable_type,
            'status'          => TicketStatusEnum::WAIT_FOR_USER,
            'is_reply'        => true
        ]);

        if ($request->hasFile('file')) {
            $uploadedFilePath = $this->uploadOneFile($request->file('file'), 'tickets\attachment');
            $replayTicket->update([
                'attachment' => $uploadedFilePath
            ]);
        }

        $type = explode('\\', $ticket->ticketable_type);

        $details = [
            'user_type' => strtolower($type[2]),
            'user' => $ticket->ticketable,
            'title' => $ticket->title,
            'type'  => 'reply'
        ];

        event(new SendNewTicketEvent($details));

        return redirect()->route('webmaster.tickets.index')->with('toast_success', __('messages.tickets.created'));
    }

    public function done(Ticket $ticket)
    {
        $ticket->update([
            'status'  => TicketStatusEnum::DONE,
            'done'    => true,
            'done_at' => now(),
        ]);

        return response()->json([
            'message' => 'تیکت با موفقیت بسته شد',
        ], Response::HTTP_OK);
    }

    public function open(Ticket $ticket)
    {
        $ticket->update([
            'status'  => TicketStatusEnum::DONE,
            'done'    => false,
            'done_at' => null,
        ]);

        return response()->json([
            'message' => 'تیکت با موفقیت بسته شد',
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $user = auth(AuthGuardEnum::USER)->user();

        $ticket = Ticket::create([
            'title'            => $request->title,
            'body'            => $request->body,
            'admin_id'        => $user->id,
            'ticketable_id'   => $request->user_id,
            'ticketable_type' => User::class,
            'status'          => TicketStatusEnum::SNEW,
            'is_admin'        => true
        ]);

        if ($request->hasFile('file')) {
            $uploadedFilePath = $this->uploadOneFile($request->file('file'), 'tickets\attachment');
            $ticket->update([
                'attachment' => $uploadedFilePath
            ]);
        }

        $details = [
            'user_type' => 'user',
            'user' => $ticket->ticketable,
            'title' => $ticket->title,
            'type'  => 'ticket'
        ];

        event(new SendNewTicketEvent($details));


        return redirect()->route('webmaster.tickets.index')->with('toast_success', __('messages.tickets.created'));
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('webmaster.tickets.tickets.all')->with('toast_success', 'تیکت مورد نظر با موفقیت ایجاد شد.');
    }
}
