<?php

namespace App\Http\Controllers\Webmaster\Miscellaneous\Faq;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class FaqController extends Controller
{

    public function index()
    {
        $faqs = Faq::latest()->paginate(10);

        return view('webmaster.miscellaneous.faqs.questions.index', compact('faqs'));
    }

    public function create()
    {
        return view('webmaster.miscellaneous.faqs.questions.create');
    }

    public function store(Request $request)
    {
        $faq = Faq::create([
            'title' => $request->title,
            'active' => $request->has('active') ? true : false,
        ]);

        return redirect()->route('webmaster.faqs.index')->with('toast_success', 'نحوه آشنایی با ما مورد نظر با موفقیت ایجاد شد.');
    }

    public function show(Faq $faq)
    {
        return view('webmaster.miscellaneous.faqs.questions.show', compact('faq'));
    }

    public function edit(Faq $faq)
    {
        return view('webmaster.miscellaneous.faqs.questions.edit', compact("faq"));
    }

    public function update(Request $request, Faq $faq)
    {

        $faq->update([
            'title' => $request->title,
            'active' => $request->has('active') ? true : false,
        ]);

        return redirect()->route('webmaster.faqs.index')->with('toast_success', 'نحوه آشنایی با ما مورد نظر با موفقیت ویرایش شد.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
