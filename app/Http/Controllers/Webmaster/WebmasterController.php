<?php

namespace App\Http\Controllers\Webmaster;

use Carbon\Carbon;
use App\Models\JobRequest;
use App\Http\Controllers\Controller;

class WebmasterController extends Controller
{
    public function webmaster()
    {
        $fromDate = Carbon::now()->startOfMonth()->toDateString();
        $tillDate = Carbon::now()->endOfMonth()->toDateString();

        // $latestUsers = User::latest()->take(10)->get();
        // $latestPayments = Payment::latest()->take(10)->get();
        // $latestFreelancers = Freelancer::latest()->take(10)->get();
        // $latestTickets = Ticket::latest()->take(10)->get();

        // $freelancersCount = Freelancer::whereBetween('created_at', [$fromDate, $tillDate])->get()->count();
        // $usersCount = User::whereBetween('created_at', [$fromDate, $tillDate])->get()->count();
        // $ticketsCount = Ticket::whereBetween('created_at', [$fromDate, $tillDate])->get()->count();
        // $newTicketsCount = Ticket::where('status', SeoProjectStatusEnum::NEW)->get()->count();
        // $contentOrderCount = Project::get()->count();
        // $contentOrders = Project::get();

        // $cashMonth = Payment::where('payment', 1)->whereBetween('created_at', [$fromDate, $tillDate])->sum('amount');
        // $cashAll = Payment::where('payment', 1)->sum('amount');


        return view('webmaster.index', get_defined_vars());
    }

    public function jobRequests()
    {
        $jobs = JobRequest::latest()->get();
        return view('webmaster.jobs.requests', compact('jobs'));
    }

    public function jobRequestsShow(JobRequest $job)
    {
        return view('webmaster.jobs.show', compact('job'));
    }
}
