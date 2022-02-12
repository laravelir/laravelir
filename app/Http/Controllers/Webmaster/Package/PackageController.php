<?php

namespace App\Http\Controllers\Webmaster\Package;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->get();

        return view('webmaster.packages.all', compact('packages'));
    }

    public function create()
    {
        return view('webmaster.packages.create');
    }

    public function store(Request $request)
    {
        $package = Package::create([
            'description'    => $request->description,
            'price'          => $request->price,
            'price_discount' => $request->price_discount,
            'dollar_price'          => $request->dollar_price,
            'dollar_price_discount' => $request->dollar_price_discount,
            'order'           => $request->order,
            'type'           => $request->type,
            'active'         => $request->has('active') ? true : false,
            'vip'            => $request->has('vip') ? true : false,
        ]);

        $package->title = [
            'fa' => $request->title,
            'en' => $request->en_title,
        ];

        $package->save();

        return redirect()->route('webmaster.packages.index')->with([
            'message' => 'پکیج ثبت شد',
            'type' => 'success'
        ]);;
    }

    public function show(Package $package)
    {

        return view('webmaster.packages.show', compact('package'));
    }

    public function edit(Package $package)
    {
        return view('webmaster.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $package->update([
            'description'    => $request->description ?? '',
            'price'          => $request->price,
            'price_discount' => $request->price_discount,
            'dollar_price'          => $request->dollar_price,
            'dollar_price_discount' => $request->dollar_price_discount,
            'type'           => $request->type,
            'active'         => $request->has('active') ? true : false,
            'vip'            => $request->has('vip') ? true : false,
        ]);

        $package->title = [
            'fa' => $request->title,
            'en' => $request->en_title,
        ];

        $package->save();

        return redirect()->route('webmaster.packages.index')->with([
            'message' => 'پکیج ویرایش شد',
            'type' => 'success'
        ]);;
    }

    public function destroy(Package $package)
    {
        $package->delete();

        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }

    public function orders()
    {
        $orders = DB::table('order_packages')->get();
        return view('webmaster.packages.orders', compact('orders'));
    }

    public function orderShow($package)
    {
        $package = DB::table('order_packages')->where([
            'id' => $package,
        ])->first();
        return view('webmaster.packages.order-show', compact('package'));
    }
}
