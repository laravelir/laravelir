<?php

namespace App\Http\Controllers\Webmaster\Ticket;

use App\Models\TicketSubject;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Webmaster\WebmasterController;

class TicketSubjectController extends WebmasterController
{

    public function index()
    {
        $subjects = TicketSubject::get();
        return view('webmaster.tickets.subjects.all', compact('subjects'));
    }

    public function create()
    {
        return view('webmaster.tickets.subjects.create');
    }

    public function edit(TicketSubject $subject)
    {
        return view('webmaster.tickets.subjects.edit', compact('subject'));
    }

    public function store(Request $request)
    {
        $subject = TicketSubject::create([
            'active' => $request->boolean('active') ? true : false,
        ]);

        return redirect()->route('webmaster.subjects.index')->with('toast_success', 'دپارتمان تیکت مورد نظر با موفقیت ایجاد شد.');
    }

    public function update(Request $request, TicketSubject $subject)
    {
        $subject->update([
            'active' => $request->boolean('active') ? true : false,
        ]);


        return redirect()->route('webmaster.subjects.index')->with('toast_success', 'دپارتمان تیکت مورد نظر با موفقیت بروزرسانی شد.');
    }

    public function destroy(TicketSubject $subject)
    {
        $subject->forceDelete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
