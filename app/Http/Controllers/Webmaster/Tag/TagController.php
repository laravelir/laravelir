<?php

namespace App\Http\Controllers\Webmaster\Tag;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Webmaster\Tag\TagRequest;
use App\Scopes\ActiveScope;
use Illuminate\Http\Response;

// use App\Repositories\Tag\TagEloquentRepositoryInterface;

class TagController extends Controller
{

    // private $tagRepo;

    // public function __construct(TagEloquentRepositoryInterface $tagRepo)
    // {
    //     $this->tagRepo = $tagRepo;
    // }

    public function index()
    {

        // $tags = $this->tagRepo->all();
        $tags = Tag::latest()->paginate(10);

        return view('webmaster.content.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('webmaster.content.tags.create');
    }

    public function store(TagRequest $request)
    {
        Tag::create([
            'title' => $request->title,
            'active' => $request->has('active') ? true : false,
        ]);

        return redirect()->route('webmaster.tags.index')->with('toast_success', __('messages.tags.created'));
    }

    public function show(Tag $tag)
    {
        return view('webmaster.content.tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('webmaster.content.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'active' => $request->boolean('active')
        ]);
        return redirect()->route('webmaster.tags.index')->with('toast_success', __('messages.tags.updated'));
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
