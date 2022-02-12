<?php

namespace App\Http\Controllers\Webmaster\Factor;

use App\Models\Factor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Scopes\ActiveScope;
use Illuminate\Http\Response;

// use App\Repositories\Factor\FactorEloquentRepositoryInterface;

class FactorController extends Controller
{
    public function index()
    {
        $this->seo()->setTitle('درخواست فاکتور ها');
        $factors = Factor::latest()->get();

        return view('webmaster.financials.factors.all', compact('factors'));
    }

    public function uploadFactor(Factor $factor, Request $request)
    {

        if ($request->hasFile('file_url')) {
            $uploadedFilePath = $this->uploadOneFile($request->file('file_url'), 'factors');
            $factor->update([
                'file_url' => $uploadedFilePath
            ]);
        }
        return redirect()->route('webmaster.factors')->with([
            'message' => 'فایل فاکتور اپلود شد',
            'type' => 'success'
        ]);
    }

    public function create()
    {
        $this->seo()->setTitle('ثبت درخواست فاکتور جدید');

        return view('webmaster.financials.factors.create');
    }

    public function store(Request $request)
    {
        $factor = Factor::create([
            'name' => $request->name,
            'active' => $request->boolean('active')
        ]);

        return redirect()->route('webmaster.factors.index')->with('success', 'درخواست فاکتور مورد نظر با موفقیت ایجاد شد.');
    }

    public function show(Factor $factor)
    {
        return view('webmaster.financials.factors.show', compact('factor'));
    }

    public function edit(Factor $factor)
    {
        $this->seo()->setTitle('ویرایش درخواست فاکتور');

        return view('webmaster.financials.factors.edit', compact('factor'));
    }

    public function update(Request $request, Factor $factor)
    {
        $factor->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'active' => $request->boolean('active')
        ]);
        return redirect()->route('webmaster.factors.index')->with('success', 'درخواست فاکتور مورد نظر با موفقیت ویرایش شد.');
    }

    public function destroy(Factor $factor)
    {
        $factor->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
