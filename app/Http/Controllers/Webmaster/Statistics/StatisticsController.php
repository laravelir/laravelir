<?php

namespace App\Http\Controllers\Webmaster\Statistics;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Freelancer;

class StatisticsController extends Controller
{

    public function index()
    {
        $this->seo()->setTitle('آمار');

        $users = User::count();
        $freelancers = Freelancer::count();
        $comments = Comment::count();
        $earnings = DB::table('payments')->where('payment', 1)->sum('amount');

        return view('webmaster.statistics.statistics', get_defined_vars());
    }
}
