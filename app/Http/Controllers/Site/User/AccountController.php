<?php

namespace App\Http\Controllers\Site\User;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;


class AccountController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('جامعه توسعه دهنگان لاراول ایران');
        SEOTools::setDescription('جامعه توسعه دهنگان لاراول ایران');
        OpenGraph::addProperty('type', 'website');
        JsonLd::addImage(asset("/statics/shared/images/logo.png"));
        OpenGraph::addImage(asset("/statics/shared/images/logo.png"));
        TwitterCard::setImage(asset("/statics/shared/images/logo.png"));

        $users = User::latest()->paginate(18);

        return view('site.users.account.index', compact('users'));
    }

    public function show(User $user)
    {
        SEOTools::setTitle('جامعه توسعه دهنگان لاراول ایران');
        SEOTools::setDescription('جامعه توسعه دهنگان لاراول ایران');
        OpenGraph::addProperty('type', 'website');
        JsonLd::addImage(asset("/statics/shared/images/logo.png"));
        OpenGraph::addImage(asset("/statics/shared/images/logo.png"));
        TwitterCard::setImage(asset("/statics/shared/images/logo.png"));

        return view('site.users.profile', compact('user'));
    }
}
