<?php

namespace App\Http\Controllers\Webmaster\Language;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Scopes\ActiveScope;
use Illuminate\Http\Response;


class LanguageController extends Controller
{

    public function index()
    {
        $this->seo()->setTitle('زبان ها');
        $languages = Language::withoutGlobalScope(ActiveScope::class)->latest()->get();

        return view('webmaster.languages.all', compact('languages'));
    }

    public function create()
    {
        $this->seo()->setTitle('ثبت زبان جدید');

        return view('webmaster.languages.create');
    }

    public function store(Request $request)
    {
        $language = Language::create([
            'active' => $request->has('active') ? true : false
        ]);

        $language->title = [
            'fa' => $request->title,
            'en' => $request->en_title,
        ];

        $language->save();

        return redirect()->route('webmaster.languages.index')->with([
            'message' => 'زبان ثبت شد',
            'type' => 'success'
        ]);
    }

    public function show(Language $language)
    {
        return view('webmaster.languages.show', compact('language'));
    }

    public function edit(Language $language)
    {
        $this->seo()->setTitle('ویرایش زبان');

        return view('webmaster.languages.edit', compact('language'));
    }

    public function update(Request $request, Language $language)
    {
        $language->update([
            'active' => $request->has('active') ? true : false
        ]);

        $language->title = [
            'fa' => $request->title,
            'en' => $request->en_title,
        ];

        $language->save();

        return redirect()->route('webmaster.languages.index')->with([
            'message' => 'زبان ویرایش شد',
            'type' => 'success'
        ]);
    }

    public function destroy(Language $language)
    {
        $language->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
