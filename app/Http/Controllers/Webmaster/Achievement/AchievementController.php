<?php

namespace App\Http\Controllers\Webmaster\Achievement;

use App\Models\User;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class AchievementController extends Controller
{

    public function index()
    {
        $achievements = Achievement::latest()->get();

        return view('webmaster.achievements.all', compact('achievements'));
    }

    public function create()
    {
        return view('webmaster.achievements.create');
    }

    public function store(Request $request)
    {

        $achievement = Achievement::create([
            'active' => $request->boolean('active') ? true : false,
            'percent' => $request->percent,
        ]);

        $achievement->name = [
            'fa' => $request->name,
            'en' => $request->en_name,
        ];

        $achievement->save();

        return redirect()->route('webmaster.achievements.index')->with([
            'message' => 'دسته بندی ثبت شد',
            'type' => 'success'
        ]);
    }

    public function show(Achievement $achievement)
    {
        return view('webmaster.achievements.show', compact('achievement'));
    }

    public function edit(Achievement $achievement)
    {
        $achievements = Achievement::where('id', '!=', $achievement->id)->get();

        return view('webmaster.achievements.edit', compact('achievement', 'achievements'));
    }
    public function update(Request $request, Achievement $achievement)
    {
        $achievement->update([
            'active' => $request->boolean('active') ? true : false,
            'percent' => $request->percent,
        ]);

        $achievement->name = [
            'fa' => $request->name,
            'en' => $request->en_name,
        ];

        $achievement->save();

        return redirect()->route('webmaster.achievements.index')->with([
            'message' => 'دسته بندی ویرایش شد',
            'type' => 'success'
        ]);
    }

    public function destroy(Achievement $achievement)
    {
        $achievement->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
        // return redirect()->route('webmaster.achievements.index')->with('toast_success', 'دسته بندی مورد نظر با موفقیت حذف شد.');
    }

    public function assignForm()
    {
        $this->seo()->setTitle('نقش ها');

        $achievements = Achievement::latest()->get();
        $users = User::latest()->get();
        return view('webmaster.acl.roles.role_to_user', compact('achievements', 'users'));
    }

    public function assign()
    {
        $this->seo()->setTitle('نقش ها');

        $roles = Role::latest()->get();
        $users = User::latest()->get();
        return view('webmaster.acl.roles.role_to_user', compact('roles', 'users'));
    }
}
