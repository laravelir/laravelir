<?php

namespace App\Http\Controllers\Site;

use App\Models\Package;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Discuss;
use App\Models\Podcast;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;


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

    public function show(Podcast $podcast)
    {
        SEOTools::setTitle('جامعه توسعه دهنگان لاراول ایران');
        SEOTools::setDescription('جامعه توسعه دهنگان لاراول ایران');
        OpenGraph::addProperty('type', 'website');
        JsonLd::addImage(asset("/statics/shared/images/logo.png"));
        OpenGraph::addImage(asset("/statics/shared/images/logo.png"));
        TwitterCard::setImage(asset("/statics/shared/images/logo.png"));

        return view('site.index');
    }
}
