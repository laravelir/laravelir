<?php

namespace App\Http\Controllers\Webmaster\Discussion;

use App\Models\Tag;
use App\Models\Discuss;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\Response;
use Artesaos\SEOTools\Facades\TwitterCard;
use App\Http\Requests\Site\User\DiscussRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;


class DiscussionController extends Controller
{
    public function index()
    {
        $discussions = Discuss::where('parent_id', 0)->latest()->paginate(20);
        return view('webmaster.discussions.index', compact('discussions'));
    }

    public function create()
    {

        $categories = Category::get();
        $tags = Tag::get();
        return view('webmaster.discussions.create', compact('tags', 'categories'));
    }

    public function show($slug)
    {
        $discuss = Discuss::where('slug', $slug)->first();
        return view('webmaster.discussions.show', compact('discuss'));
    }

    public function store(DiscussRequest $request)
    {
        // dd($request->all());
        DB::transaction(function () use ($request) {
            $discuss = user()->discussions()->create($request->only(['title', 'category_id', 'body']));
            $tags = collect($request->tags);
            $tags->each(function ($i) use ($discuss){
               DB::table('taggables')->insert([
                'tag_id' => $i,
                'taggable_id' => $discuss->id,
                'taggable_type' => get_class($discuss),
               ]);
            });
        });

        return Response::success('webmaster.discussions.index', 'گفتگو با موفقیت ثبت شد.');
    }

    public function delete(Discuss $discuss)
    {
        $discuss->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], HttpResponse::HTTP_OK);
    }
}
