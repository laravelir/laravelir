<?php

namespace App\Http\Controllers\Webmaster\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('can:create-comment,user');
            // $this->middleware('can:edit-comment')->only(['edit', 'update']);
    // }

    public function index()
    {
        $comments = Comment::latest()->paginate(20);
        return view('webmaster.content.comments.index', compact('comments'));
    }

    public function create()
    {
        return view('webmaster.comments.create');
    }

    public function store(Request $request)
    {
        $comments = Comment::create($request->only('title', 'description'));

        return redirect()->route('webmaster.comments.index')->with('toast_success', 'نظرات مورد نظر با موفقیت ایجاد شد.');
    }

    // public function store(SeriesRequest $request)
    // {
    //     $series = $this->dispatchNow(CreateSeries::fromRequest($request));

    //     $this->success('series.created');

    //     return redirect()->route('user.series');
    // }

    public function show(Comment $comment)
    {
        return view('webmaster.content.comments.show', compact('comment'));
    }

    public function approve(Comment $comment)
    {
        $comment->update([
            'approved' => 1
        ]);
        return redirect()->route('webmaster.comments.index')->with('toast_success', 'نظرات مورد نظر با موفقیت تایید شد.');
    }

    public function edit(Comment $comment)
    {
        return view('webmaster.comments.edit', compact('comments'));
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->only('title', 'description'));
        return redirect()->route('webmaster.comments.index')->with('toast_success', 'نظرات مورد نظر با موفقیت ویرایش شد.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
