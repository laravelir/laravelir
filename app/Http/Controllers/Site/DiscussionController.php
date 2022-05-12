<?php

namespace App\Http\Controllers\Site;

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
        SEOTools::setTitle('جامعه توسعه دهنگان لاراول ایران');
        SEOTools::setDescription('جامعه توسعه دهنگان لاراول ایران');
        OpenGraph::addProperty('type', 'website');
        JsonLd::addImage(asset("/statics/shared/images/logo.png"));
        OpenGraph::addImage(asset("/statics/shared/images/logo.png"));
        TwitterCard::setImage(asset("/statics/shared/images/logo.png"));

        $discussions = Discuss::where('parent_id', 0)->latest()->paginate(20);
        return view('site.discussions.index', compact('discussions'));
    }

    public function create()
    {
        SEOTools::setTitle('جامعه توسعه دهنگان لاراول ایران');
        SEOTools::setDescription('جامعه توسعه دهنگان لاراول ایران');
        OpenGraph::addProperty('type', 'website');
        JsonLd::addImage(asset("/statics/shared/images/logo.png"));
        OpenGraph::addImage(asset("/statics/shared/images/logo.png"));
        TwitterCard::setImage(asset("/statics/shared/images/logo.png"));

        $categories = Category::get();
        $tags = Tag::get();
        return view('site.discussions.create', compact('tags', 'categories'));
    }

    public function show($slug)
    {
        SEOTools::setTitle('جامعه توسعه دهنگان لاراول ایران');
        SEOTools::setDescription('جامعه توسعه دهنگان لاراول ایران');
        OpenGraph::addProperty('type', 'website');
        JsonLd::addImage(asset("/statics/shared/images/logo.png"));
        OpenGraph::addImage(asset("/statics/shared/images/logo.png"));
        TwitterCard::setImage(asset("/statics/shared/images/logo.png"));

        $discuss = Discuss::where('slug', $slug)->first();
        return view('site.discussions.show', compact('discuss'));
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

        return Response::success('site.discussions.index', 'گفتگو با موفقیت ثبت شد.');
    }

    public function delete(Discuss $discuss)
    {
        $discuss->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], HttpResponse::HTTP_OK);
    }
}
