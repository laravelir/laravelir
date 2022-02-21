<?php

namespace App\Http\Controllers\Webmaster\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\Webmaster\User\UserRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(8);

        return view('webmaster.users.index', compact('users'));
    }

    public function create()
    {
        return view('webmaster.users.create');
    }

    public function store(UserRequest $request)
    {
        $request->validated();
        $user = User::create([
            'mobile'    => $request->mobile ?? null,
            'email'    => $request->email,
            'password' => $request->password,
            'is_admin' => $request->has('is_admin') ? true : false,
        ]);

        $user->profile()->update([
            'fname'    => $request->fname,
            'lname'    => $request->lname,
        ]);


        if ($request->has('active')) {
            $user->metas->update([
                'email_verified_at' => now(),
            ]);

            if ($request->has('mobile')) {
                $user->metas->update([
                    'mobile_verified_at' => now(),
                ]);
            }
        }

        // if ($request->has('notify_email')) {
        //  $user->notify();
        // }

        return redirect()->route('webmaster.users.index')->with([
            'message' => __('messages.users.create'),
            'type' => 'success'
        ]);
    }

    public function show(User $user)
    {

        return view('webmaster.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::latest()->get();
        return view('webmaster.users.edit', compact('user', 'roles'));
    }

    public function nationalCardApprove(User $user)
    {
        $user->profile()->update([
            'national_card_image_approved' => true
        ]);

        return back()->with([
            'message' => 'کارت ملی تایید شد',
            'type' => 'success'
        ]);
    }

    public function update(Request $request, User $user)
    {
        // $request->validate([
        //     'email' => ['required', 'email', 'string', 'max:255', 'unique:users,email'],
        //     'mobile' => ['required', 'string', 'min:11', 'max:11', 'unique:users,mobile'],
        //     'password' => ['required', 'confirmed', 'min:8'],
        //     'fname' => ['required'],
        //     'lname' => ['required'],
        //     'is_admin' => ['nullable'],
        //     'active' => ['nullable'],
        // ]);


        $data = [
            'mobile' => $request->mobile,
            'email' => $request->email,
        ];

        if (!is_null($request->password)) {
            $request->validate([
                'password' => ['required', 'min:8', 'max:255'],
            ]);

            $data['password'] = $request->password;
        }

        if ($request->has('wallet_amount')) {
            $user->wallet()->update([
                'amount' => $request->wallet_amount,
            ]);
        }

        if ($request->has('wallet_damount')) {
            $user->wallet()->update([
                'dollar_amount' => $request->wallet_damount,
            ]);
        }

        if (!is_null($request->fname) || !is_null($request->lname)) {
            $d = $request->validate([
                'fname' => ['nullable', 'min:3', 'max:255'],
                'lname' => ['nullable', 'min:3', 'max:255'],
            ]);

            $user->profile()->update($d);
        }

        $data['is_admin'] = false;
        if ($request->boolean('is_admin')) {
            $data['is_admin'] = true;
        }

        if ($request->has('active')) {
            $user->markEmailAsVerified();
            $data['mobile_verified_at'] = now();
        }

        if (!$request->has('active')) {
            $data['email_verified_at'] = null;
            $data['mobile_verified_at'] = null;
        }

        $user->update($data);

        return redirect()->route('webmaster.users.index')->with([
            'message' => 'کاربر ویرایش شد',
            'type' => 'success'
        ]);
    }

    public function destroy(User $user)
    {
        DB::transaction(function () use ($user) {

            $user->delete();
        });

        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
