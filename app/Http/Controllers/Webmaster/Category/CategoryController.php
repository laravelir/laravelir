<?php

namespace App\Http\Controllers\Webmaster\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Webmaster\Category\CategoryRequest;
use Illuminate\Http\Response;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->paginate(10);

        return view('webmaster.content.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::latest()->get();
        return view('webmaster.content.categories.create', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create([
            'title' => $request->title,
            'parent_id' => $request->parent_id,
            'color_hex' => $request->color_hex,
            'active' => $request->boolean('active') ? true : false,
        ]);

        return redirect()->route('webmaster.categories.index')->with('toast_success', __('messages.categories.created'));
    }

    public function show(Category $category)
    {
        return view('webmaster.content.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $categories = Category::where('id', '!=', $category->id)->get();

        return view('webmaster.content.categories.edit', compact('category', 'categories'));
    }
    public function update(Request $request, Category $category)
    {
        $category->update([
            'title' => $request->title,
            'parent_id' => $request->parent_id,
            'color_hex' => $request->color_hex,
            'active' => $request->boolean('active') ? true : false,
        ]);

        return redirect()->route('webmaster.categories.index')->with('toast_success', __('messages.categories.updated'));
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
