<?php

namespace App\Http\Controllers\Webmaster\Content\Podcast;

use App\Models\Tag;
use App\Models\User;
use App\Models\Podcast;
use App\Models\Category;
use App\Scopes\ActiveScope;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Webmaster\Podcast\PodcastRequest;

// use App\Repositories\Podcast\PodcastEloquentRepositoryInterface;

class PodcastController extends Controller
{

    // private $podcastRepo;

    // public function __construct(PodcastEloquentRepositoryInterface $podcastRepo)
    // {
    //     $this->podcastRepo = $podcastRepo;
    // }

    public function index()
    {

        // $podcasts = $this->podcastRepo->all();
        $podcasts = Podcast::latest()->paginate(10);

        return view('webmaster.content.podcasts.index', compact('podcasts'));
    }

    public function create()
    {
        $categories = Category::active()->get();
        $tags = Tag::active()->get();
        $authors = User::get();
        return view('webmaster.content.podcasts.create', compact('categories', 'tags', 'authors'));
    }

    public function store(PodcastRequest $request)
    {
        Podcast::create([
            'title' => $request->title,
            'active' => $request->has('active') ? true : false,
        ]);

        return redirect()->route('webmaster.podcasts.index')->with('toast_success', __('messages.podcasts.created'));
    }

    public function show(Podcast $podcast)
    {
        return view('webmaster.content.podcasts.show', compact('podcast'));
    }

    public function edit(Podcast $podcast)
    {
        return view('webmaster.content.podcasts.edit', compact('podcast'));
    }

    public function update(Request $request, Podcast $podcast)
    {
        $podcast->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'active' => $request->boolean('active')
        ]);
        return redirect()->route('webmaster.podcasts.index')->with('toast_success', __('messages.podcasts.updated'));
    }

    public function destroy(Podcast $podcast)
    {
        $podcast->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
