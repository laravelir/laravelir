<?php

namespace App\Http\Controllers\Webmaster\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->get();

        return view('webmaster.categories.all', compact('categories'));
    }

    public function create()
    {
        return view('webmaster.categories.create');
    }

    public function store(Request $request)
    {

        $category = Category::create([
            'active' => $request->boolean('active') ? true : false,
            'percent' => $request->percent,
        ]);

        $category->name = [
            'fa' => $request->name,
            'en' => $request->en_name,
        ];

        $category->save();

        return redirect()->route('webmaster.categories.index')->with([
            'message' => 'دسته بندی ثبت شد',
            'type' => 'success'
        ]);
    }

    public function show(Category $category)
    {
        return view('webmaster.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $categories = Category::where('id', '!=', $category->id)->get();

        return view('webmaster.categories.edit', compact('category', 'categories'));
    }
    public function update(Request $request, Category $category)
    {
        $category->update([
            'active' => $request->boolean('active') ? true : false,
            'percent' => $request->percent,
        ]);

        $category->name = [
            'fa' => $request->name,
            'en' => $request->en_name,
        ];

        $category->save();

        return redirect()->route('webmaster.categories.index')->with([
            'message' => 'دسته بندی ویرایش شد',
            'type' => 'success'
        ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
        // return redirect()->route('webmaster.categories.index')->with('toast_success', 'دسته بندی مورد نظر با موفقیت حذف شد.');
    }
}
