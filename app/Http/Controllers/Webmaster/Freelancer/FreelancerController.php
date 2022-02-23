<?php

namespace App\Http\Controllers\Webmaster\Freelancer;

use App\Models\Role;
use App\Models\Freelancer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Portfolio;

class FreelancerController extends Controller
{
    public function index()
    {

        $freelancers = Freelancer::latest()->get();

        return view('webmaster.freelancers.index', compact('freelancers'));
    }

    public function create()
    {
        return view('webmaster.freelancers.create');
    }

    public function store(Request $request)
    {


        $freelancer = Freelancer::create([
            'mobile'   => $request->mobile,
            'email'    => $request->email,
            'password' => $request->password,
            'official' => $request->boolean('official') ? true : false,
        ]);

        $freelancer->profile()->update([
            'fname'    => $request->fname,
            'lname'    => $request->lname,
        ]);

        if ($request->has('active')) {
            $freelancer->markEmailAsVerified();
            $freelancer->update([
                'mobile_verified_at' => now()
            ]);
        }

        return redirect()->route('webmaster.achievements.index')->with('toast_success', __('messages.achievements.updated'));

    }

    public function show(Freelancer $freelancer)
    {
        return view('webmaster.freelancers.show', compact('freelancer'));
    }

    public function edit(Freelancer $freelancer)
    {
        return view('webmaster.freelancers.edit', compact('freelancer'));
    }

    public function nationalCardApprove(Freelancer $freelancer)
    {
        $freelancer->profile()->update([
            'national_card_image_approved' => true
        ]);

        return back()->with([
            'message' => 'کارت ملی تایید شد',
            'type' => 'success'
        ]);
    }

    public function update(Request $request, Freelancer $freelancer)
    {

        // $request->validate([
        //     'email' => ['required', 'email', 'string', 'max:255', 'unique:users,email'],
        //     'mobile' => ['required', 'string', 'min:11', 'max:11', 'unique:users,mobile'],
        //     'fname' => ['required'],
        //     'lname' => ['required'],
        //     'is_admin' => ['nullable'],
        //     'active' => ['nullable'],
        // ]);


        $data = [
            'mobile' => $request->mobile,
            'percent' => $request->percent,
            'email' => $request->email,
        ];

        if (!is_null($request->password)) {
            $request->validate([
                'password' => ['required', 'min:8', 'max:255'],
            ]);

            $data['password'] = $request->password;
        }

        if (!is_null($request->fname) || !is_null($request->lname)) {
            $d = $request->validate([
                'fname' => ['nullable', 'min:3', 'max:255'],
                'lname' => ['nullable', 'min:3', 'max:255'],
            ]);

            $freelancer->profile()->update($d);
        }

        $data['official'] = false;
        if ($request->boolean('official')) {
            $data['official'] = true;
        }

        if ($request->has('active')) {
            $freelancer->markEmailAsVerified();
            $data['mobile_verified_at'] = now();
        }

        if (!$request->has('active')) {
            $data['email_verified_at'] = null;
            $data['mobile_verified_at'] = null;
        }

        $freelancer->update($data);

        return redirect()->route('webmaster.achievements.index')->with('toast_success', __('messages.achievements.updated'));
    }

    public function portfolioApprove(Portfolio $portfolio)
    {
        $portfolio->update([
            'approved' => true,
        ]);

        return response()->json([
            'message' => 'نمونه کار با موفقیت تایید شد',
        ], Response::HTTP_OK);
    }

    public function destroy(Freelancer $freelancer)
    {
        $freelancer->delete();

        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
