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
        $acquaints = AcquaintedUs::latest()->paginate(10);

        return view('webmaster.miscellaneous.acquaints.index', compact('acquaints'));
    }

    public function create()
    {
        return view('webmaster.miscellaneous.acquaints.create');
    }

    public function store(Request $request)
    {
        $acquaint = AcquaintedUs::create([
            'title' => $request->title,
            'active' => $request->has('active') ? true : false,
        ]);

        return redirect()->route('webmaster.acquaints.index')->with('toast_success', 'نحوه آشنایی با ما مورد نظر با موفقیت ایجاد شد.');
    }

    public function show(AcquaintedUs $acquaint)
    {
        return view('webmaster.miscellaneous.acquaints.show', compact('acquaint'));
    }

    public function edit(AcquaintedUs $acquaint)
    {
        return view('webmaster.miscellaneous.acquaints.edit', compact("acquaint"));
    }

    public function update(Request $request, AcquaintedUs $acquaint)
    {

        $acquaint->update([
            'title' => $request->title,
            'active' => $request->has('active') ? true : false,
        ]);

        return redirect()->route('webmaster.acquaints.index')->with('toast_success', 'نحوه آشنایی با ما مورد نظر با موفقیت ویرایش شد.');
    }

    public function destroy(AcquaintedUs $acquaint)
    {
        $acquaint->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
