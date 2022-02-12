<?php

namespace App\Http\Controllers\Webmaster\Miscellaneous\ContentQuality;

use App\Models\ContentQuality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Scopes\ActiveScope;
use Illuminate\Http\Response;


class ContentQualityController extends Controller
{

    public function index()
    {
        $this->seo()->setTitle('کیفیت محتوا  با ما ها');
        $qualities = ContentQuality::latest()->get();

        return view('webmaster.contents.qualities.all', compact('qualities'));
    }

    public function create()
    {
        $this->seo()->setTitle('ثبت کیفیت محتوا  با ما جدید');

        return view('webmaster.contents.qualities.create');
    }

    public function store(Request $request)
    {
        $quality = ContentQuality::create([
            'percent' => $request->percent,
            'active' => $request->has('active') ? true : false
        ]);

        $quality->title = [
            'fa' => $request->title,
            'en' => $request->en_title,
        ];

        $quality->save();

        return redirect()->route('webmaster.qualities.index')->with('toast_success', 'کیفیت محتوا  با ما مورد نظر با موفقیت ایجاد شد.');
    }

    public function show(ContentQuality $quality)
    {
        return view('webmaster.contents.qualities.show', compact('quality'));
    }

    public function edit(ContentQuality $quality)
    {
        $this->seo()->setTitle('ویرایش کیفیت محتوا  با ما');

        return view('webmaster.contents.qualities.edit', compact('quality'));
    }

    public function update(Request $request, ContentQuality $quality)
    {
        $quality->update([
            'percent'   => $request->percent,
            'active' => $request->has('active') ? true : false
        ]);

        $quality->title = [
            'fa' => $request->title,
            'en' => $request->en_title,
        ];

        $quality->save();

        return redirect()->route('webmaster.qualities.index')->with('toast_success', 'کیفیت محتوا  با ما مورد نظر با موفقیت ویرایش شد.');
    }

    public function destroy(ContentQuality $quality)
    {
        $quality->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
