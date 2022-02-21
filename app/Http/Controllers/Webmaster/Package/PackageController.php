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
        $packages = Package::latest()->paginate(8);

        return view('webmaster.packages.index', compact('packages'));
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

        return redirect()->route('webmaster.packages.index')->with('toast_success', __('messages.packages.created'));
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


        return redirect()->route('webmaster.packages.index')->with('toast_success', __('messages.packages.updated'));
    }

    public function destroy(Package $package)
    {
        $package->delete();

        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
