<?php

namespace App\Http\Controllers\Webmaster\Statistics;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Freelancer;
use App\Models\Package;
use App\Models\Podcast;
use App\Models\Post;

class StatisticsController extends Controller
{

    public function index()
    {

        $users       = User::count();
        $freelancers = Freelancer::count();
        $comments    = Comment::count();
        $packages    = Package::count();
        $podcasts    = Podcast::count();
        $posts       = Post::count();
        $earnings    = DB::table('payments')->where('payment', 1)->sum('amount');

        return view('webmaster.statistics.statistics', get_defined_vars());
    }
}
