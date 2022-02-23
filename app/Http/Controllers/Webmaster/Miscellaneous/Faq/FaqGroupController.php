<?php

namespace App\Http\Controllers\Webmaster\Miscellaneous\Faq;

use App\Models\FaqGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class FaqGroupController extends Controller
{

    public function index()
    {
        $faqGroups = FaqGroup::latest()->paginate(10);

        return view('webmaster.miscellaneous.faqs.groups.index', compact('faqGroups'));
    }

    public function create()
    {
        return view('webmaster.miscellaneous.faqs.groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'unique:faq_groups,title'],
            'active' => ['nullable']
        ]);

        FaqGroup::create([
            'title' => $request->title,
            'active' => $request->has('active') ? true : false,
        ]);

        return redirect()->route('webmaster.faq-groups.index')->with('toast_success', 'نحوه آشنایی با ما مورد نظر با موفقیت ایجاد شد.');
    }

    public function show(FaqGroup $faqGroup)
    {
        return view('webmaster.miscellaneous.faqs.groups.show', compact('faqGroup'));
    }

    public function edit(FaqGroup $faqGroup)
    {
        return view('webmaster.miscellaneous.faqs.groups.edit', compact("faqGroup"));
    }

    public function update(Request $request, FaqGroup $faqGroup)
    {
        // $request->validate([
        //     'title' => ['required', 'unique:faq_groups,title'],
        //     'active' => ['nullable']
        // ]);

        $faqGroup->update([
            'title' => $request->title,
            'active' => $request->has('active') ? true : false,
        ]);

        return redirect()->route('webmaster.faq-groups.index')->with('toast_success', 'نحوه آشنایی با ما مورد نظر با موفقیت ویرایش شد.');
    }

    public function destroy(FaqGroup $faqGroup)
    {
        $faqGroup->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
