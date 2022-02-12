<?php

namespace App\Http\Controllers\Webmaster\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index()
    {
        $this->seo()->setTitle('محصولات');
        $products = Product::get();
        return view('webmaster.products.all', compact('products'));
    }

    public function create()
    {
        $this->seo()->setTitle('ایجاد محصول جدید');

        $languages = Language::active()->get();

        return view('webmaster.products.create', compact('languages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required',
            'dollar_price' => 'required',
            'type' => 'required',
            'language_id' => 'required',
        ]);

        $data = [
            'price' => $request->price,
            'dollar_price' => $request->dollar_price,
            'type' => $request->type,
            'language_id' => $request->language_id,
            'active' => true,
        ];

        $product = Product::create($data);

        $product->title = [
            'fa' => $request->title,
            'en' => $request->en_title,
        ];

        $product->save();

        return redirect()->route('webmaster.products.index')->with([
            'message' => 'محصول ثبت شد',
            'type' => 'success'
        ]);
    }

    public function show(Product $product)
    {
        $this->seo()->setTitle('جزییات محصول ');

        return view('webmaster.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $this->seo()->setTitle('ویرایش محصول');

        $categories = Category::get();
        $languages = Language::active()->get();
        return view('webmaster.products.edit', compact('product', 'languages', 'categories'));
    }

    public function update(Request $request, Product $product)
    {

        $request->validate([
            'price' => 'required',
            'dollar_price' => 'required',
            'type' => 'required',
            'language_id' => 'required',
            'active' => 'nullable',
        ]);

        $data = [
            'price' => $request->price,
            'dollar_price' => $request->dollar_price,
            'type' => $request->type,
            'language_id' => $request->language_id,
            'active' => $request->has('active') ? true : false,
        ];

        $product->update($data);

        $product->title = [
            'fa' => $request->title,
            'en' => $request->en_title,
        ];

        $product->save();

        return redirect()->route('webmaster.products.index')->with([
            'message' => 'محصول ویرایش شد',
            'type' => 'success'
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        // $product->languages()->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
