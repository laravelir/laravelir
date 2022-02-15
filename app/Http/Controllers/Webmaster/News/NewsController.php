<?php

namespace App\Http\Controllers\Webmaster\News;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();

        return view('webmaster.news.all', compact('news'));
    }

    public function create()
    {
        return view('webmaster.news.create');
    }

    public function store(Request $request)
    {
        $new = News::create([
            'title'          => $request->title,
            'description'    => $request->description,
            'active'         => $request->has('active') ? true : false,
        ]);

        $new->title = [
            'fa' => $request->title,
            'en' => $request->en_title,
        ];

        $new->save();

        return redirect()->route('webmaster.news.index')->with([
            'message' => 'پکیج ثبت شد',
            'type' => 'success'
        ]);;
    }

    public function show(News $new)
    {

        return view('webmaster.news.show', compact('new'));
    }

    public function edit(News $new)
    {
        return view('webmaster.news.edit', compact('new'));
    }

    public function update(Request $request, News $new)
    {
        $new->update([
            'description'    => $request->description ?? '',
            'price'          => $request->price,
            'price_discount' => $request->price_discount,
            'dollar_price'          => $request->dollar_price,
            'dollar_price_discount' => $request->dollar_price_discount,
            'type'           => $request->type,
            'active'         => $request->has('active') ? true : false,
            'vip'            => $request->has('vip') ? true : false,
        ]);

        $new->title = [
            'fa' => $request->title,
            'en' => $request->en_title,
        ];

        $new->save();

        return redirect()->route('webmaster.news.index')->with([
            'message' => 'پکیج ویرایش شد',
            'type' => 'success'
        ]);;
    }

    public function destroy(News $new)
    {
        $new->delete();

        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }

    public function orders()
    {
        $orders = DB::table('order_news')->get();
        return view('webmaster.news.orders', compact('orders'));
    }

    public function orderShow($new)
    {
        $new = DB::table('order_news')->where([
            'id' => $new,
        ])->first();
        return view('webmaster.news.order-show', compact('new'));
    }
}
