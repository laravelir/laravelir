<?php

namespace App\Http\Controllers\Webmaster\backup\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use App\Models\ProductLanguage;
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
        $categories = Category::get();

        return view('webmaster.products.create', compact('languages', 'categories'));
    }

    public function store(Request $request)
    {
        $prices = collect($request->prices);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
        ];

        $product = Product::create($data);

        $filteredPrices = $prices->filter(function ($value, $key) {
            return $value !== null;
        });

        $filteredPrices->each(function ($item, $key) use ($product) {

            ProductLanguage::create([
                'languageable_id' => $product->id,
                'languageable_type' => get_class($product),
                'language_id' => $key,
                'price' => $item,
            ]);
        });

        return redirect()->route('webmaster.products.index')->with('toast_success', 'محصول مورد نظر با موفقیت ایجاد شد.');
    }

    public function show(Product $product)
    {
        $this->seo()->setTitle('جزییات محصول ');

        return view('webmaster.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $this->seo()->setTitle('ویرایش محصول');

        // return $product;

        $categories = Category::get();
        $languages = Language::active()->get();
        return view('webmaster.products.edit', compact('product', 'languages', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
//        dd($request->all());

        $currentLanguages = $product->languages()->pluck('language_id')->collect();


        $prices = collect($request->prices);

        $filteredPrices = $prices->filter(function ($value, $key) {
            return $value !== null;
        });


        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'active' => $request->active ? true : false,
        ];

        $product->update($data);

        $filteredPrices->each(function ($item, $key) use ($product) {
            ProductLanguage::updateOrCreate([
                'languageable_id' => $product->id,
                'languageable_type' => get_class($product),
                'language_id' => $key,
            ], [
                'price' => $item,
            ]);
        });


        return redirect()->route('webmaster.products.index')->with('toast_success', 'محصول مورد نظر با موفقیت ویرایش شد.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        $product->languages()->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
