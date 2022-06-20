<?php

namespace App\Http\Controllers\Site\User;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\Response;
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

    public function editForm()
    {
        SEOTools::setTitle('جامعه توسعه دهنگان لاراول ایران');
        SEOTools::setDescription('جامعه توسعه دهنگان لاراول ایران');
        OpenGraph::addProperty('type', 'website');
        JsonLd::addImage(asset("/statics/shared/images/logo.png"));
        OpenGraph::addImage(asset("/statics/shared/images/logo.png"));
        TwitterCard::setImage(asset("/statics/shared/images/logo.png"));

        $user = user();
        return view('site.users.account.edit', compact('user'));
    }

    public function edit(Request $request)
    {
        $user = user();
        $user->update();
        return Response::back('', 'success');
    }

    public function passwordChangeForm()
    {
        SEOTools::setTitle('جامعه توسعه دهنگان لاراول ایران');
        SEOTools::setDescription('جامعه توسعه دهنگان لاراول ایران');
        OpenGraph::addProperty('type', 'website');
        JsonLd::addImage(asset("/statics/shared/images/logo.png"));
        OpenGraph::addImage(asset("/statics/shared/images/logo.png"));
        TwitterCard::setImage(asset("/statics/shared/images/logo.png"));

        return view('site.users.account.password-change');
    }

    public function passwordChange(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = user();

        if (!Hash::check($request->old_password, $user->password)) {
            return Response::back('رمز عبور قدیمی با رمز شما یکسان نیست.', 'error');
        }

        if ($request->password == $request->old_password) {
            return Response::back('رمز عبور حدید نمیتواند با رمز عبور جدید یکسان باشد..', 'error');
        }

        $user->profile->update([
            'password' => $request->password,
        ]);
        $user->metas->update([
            'password_changed_at' => now(),
        ]);

        return Response::back('رمز عبور ویرایش شد.', 'success');
    }
}
