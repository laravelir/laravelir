<?php

namespace App\Http\Controllers\Webmaster\GiftCode;

use App\Models\Freelancer;
use App\Models\User;
use App\Models\GiftCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class GiftCodeController extends Controller
{
    public function index()
    {
        $giftCodes = GiftCode::latest()->paginate(10);
        return view('webmaster.financial.giftcodes.index', compact('giftCodes'));
    }

    public function create()
    {
        $users    = User::latest()->get();
        $freelancers    = Freelancer::latest()->get();
        return view('webmaster.financial.giftcodes.create', compact('users', 'freelancers'));
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
        $giftCode = GiftCode::create($data);

        if (isset($request->users)) {
            $giftCode->users()->sync($request->users);
        }

        return redirect()->route('webmaster.giftcodes.index')->with('toast_success', __('messages.giftcodes.updated'));
    }

    public function show(GiftCode $giftCode)
    {
        return view('webmaster.giftCodes.show', compact('giftCode'));
    }

    public function edit(GiftCode $giftCode)
    {
        $users = User::latest()->get();
        $freelancers    = Freelancer::latest()->get();

        return view('webmaster.giftCodes.edit', compact('giftCode', 'users', 'freelancers'));
    }

    public function update(Request $request, GiftCode $giftCode)
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
        $giftCode->update($data);

        isset($request->users)
            ? $giftCode->users()->sync($request->users)
            : $giftCode->users()->detach();

        isset($request->freelancers)
            ? $giftCode->freelancers()->sync($request->freelancers)
            : $giftCode->freelancers()->detach();


        return redirect()->route('webmaster.giftcodes.index')->with('toast_success', __('messages.giftcodes.updated'));
    }

    public function destroy(GiftCode $giftCode)
    {
        $giftCode->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
