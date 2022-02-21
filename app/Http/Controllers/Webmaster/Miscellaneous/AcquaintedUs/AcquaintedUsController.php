<?php

namespace App\Http\Controllers\Webmaster\Miscellaneous\AcquaintedUs;

use App\Models\AcquaintedUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class AcquaintedUsController extends Controller
{

    public function index()
    {
        $acquaints = AcquaintedUs::latest()->get();

        return view('webmaster.acquaints.all', compact('acquaints'));
    }

    public function create()
    {
        return view('webmaster.acquaints.create');
    }

    public function store(Request $request)
    {
        $acquaint = AcquaintedUs::create([
            'active' => $request->has('active') ? true : false,
        ]);

        $acquaint->title = [
            'fa' => $request->title,
            'en' => $request->en_title,
        ];

        $acquaint->save();

        return redirect()->route('webmaster.acquainted.index')->with('toast_success', 'نحوه آشنایی با ما مورد نظر با موفقیت ایجاد شد.');
    }

    public function show(AcquaintedUs $acquaint)
    {
        return view('webmaster.acquaints.show', compact('acquaint'));
    }

    public function edit(AcquaintedUs $acquainted)
    {
        return view('webmaster.acquaints.edit', compact("acquainted"));
    }

    public function update(Request $request, AcquaintedUs $acquainted)
    {

        $acquainted->update([
            'active' => $request->has('active') ? true : false,
        ]);

        $acquainted->title = [
            'fa' => $request->title,
            'en' => $request->en_title,
        ];

        $acquainted->save();
        return redirect()->route('webmaster.acquainted.index')->with('toast_success', 'نحوه آشنایی با ما مورد نظر با موفقیت ویرایش شد.');
    }

    public function destroy(AcquaintedUs $acquainted)
    {
        $acquainted->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
