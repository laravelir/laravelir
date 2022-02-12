<?php

namespace App\Http\Controllers\Webmaster\Discount;

use App\Models\Freelancer;
use App\Models\User;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class DiscountController extends Controller
{
    public function index()
    {
        $this->seo()->setTitle('کد هدیه ها');

        $discounts = Discount::latest()->paginate(10);
        return view('webmaster.discounts.all', compact('discounts'));
    }

    public function create()
    {
        $this->seo()->setTitle('ثبت کد هدیه جدید');

        $users    = User::latest()->get();
        $freelancers    = Freelancer::latest()->get();
        return view('webmaster.discounts.create', compact('users', 'freelancers'));
    }

    public function store(Request $request)
    {
        $data = [
            'title'       => $request->title,
            'description' => $request->description,
            'code'        => $request->code,
            'value'       => $request->value,
            'currency'       => $request->currency,
            'type'        => $request->type,
            'count_use_user'   => $request->count_use_user,
            'count_use'   => $request->count_use,
            'infinity'    => $request->has('infinity') ? true : false,
            'active'      => $request->has('active') ? true : false,
        ];
        $discount = Discount::create($data);

        if (isset($request->users)) {
            $discount->users()->sync($request->users);
        }

        if (isset($request->freelancers)) {
            $discount->freelancers()->sync($request->freelancers);
        }

        return redirect()->route('webmaster.discounts.index')->with([
            'message' => 'کد هدیه ثبت شد',
            'type' => 'success'
        ]);
    }

    public function show(Discount $discount)
    {
        $this->seo()->setTitle('جزییات کد هدیه');

        return view('webmaster.discounts.show', compact('discount'));
    }

    public function edit(Discount $discount)
    {
        $this->seo()->setTitle('ویرایش کد هدیه');

        $users = User::latest()->get();
        $freelancers    = Freelancer::latest()->get();

        return view('webmaster.discounts.edit', compact('discount', 'users', 'freelancers'));
    }

    public function update(Request $request, Discount $discount)
    {
        $data = [
            'title'       => $request->title,
            'description' => $request->description,
            'code'        => $request->code,
            'value'       => $request->value,
            'currency'     => $request->currency,
            'type'        => $request->type,
            'count_use'   => $request->count_use,
            'count_use_user'   => $request->count_use_user,
            'infinity'    => $request->has('infinity') ? true : false,
            'active'      => $request->has('active') ? true : false,
        ];
        $discount->update($data);

        isset($request->users)
            ? $discount->users()->sync($request->users)
            : $discount->users()->detach();

        isset($request->freelancers)
            ? $discount->freelancers()->sync($request->freelancers)
            : $discount->freelancers()->detach();


        return redirect()->route('webmaster.discounts.index')->with([
            'message' => 'کد هدیه ویرایش شد',
            'type' => 'success'
        ]);
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
