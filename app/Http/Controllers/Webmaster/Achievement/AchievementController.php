<?php

namespace App\Http\Controllers\Webmaster\Achievement;

use App\Models\User;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Webmaster\Achievement\AchievementRequest;
use Illuminate\Support\Facades\DB;

class AchievementController extends Controller
{

    public function index()
    {
        $achievements = Achievement::latest()->paginate(8);

        return view('webmaster.miscellaneous.achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('webmaster.miscellaneous.achievements.create');
    }

    public function store(AchievementRequest $request)
    {

        DB::transaction(function () use ($request) {
            $achievement = Achievement::create([
                'title' => $request->title,
                'logo_path' => null,
                'description' => $request->description,
                'active' => $request->boolean('active') ? true : false,
            ]);

            if (isset($request->logo_path)) {
                $uploadedFilePath = $this->uploadOneFile($request->logo_path, 'achievements/logo');
                $achievement->update(['logo_path' => $uploadedFilePath]);
            }
        });

        if ($request->has('notify')) {
            //
        }

        return redirect()->route('webmaster.achievements.index')->with(
            'toast_success',
            __('messages.achievements.created'),
        );
    }

    public function show(Achievement $achievement)
    {
        return view('webmaster.miscellaneous.achievements.show', compact('achievement'));
    }

    public function edit(Achievement $achievement)
    {
        $achievements = Achievement::where('id', '!=', $achievement->id)->get();

        return view('webmaster.miscellaneous.achievements.edit', compact('achievement', 'achievements'));
    }
    public function update(Request $request, Achievement $achievement)
    {
        DB::transaction(function () use ($request, $achievement) {
            $uploadedFilePath = $achievement->logo_path;
            $achievement->update([
                'title' => $request->title,
                'logo_path' => $uploadedFilePath,
                'description' => $request->description,
                'active' => $request->boolean('active') ? true : false,
            ]);

            if (isset($request->logo_path)) {
                $uploadedFilePath = $this->uploadOneFile($request->logo_path, 'achievements/logo');
                $achievement->update(['logo_path' => $uploadedFilePath]);
            }
        });

        return redirect()->route('webmaster.achievements.index')->with('toast_success', __('messages.achievements.updated'));
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
        $achievements = Achievement::active()->latest()->get();
        $users = User::latest()->get();
        return view('webmaster.miscellaneous.achievements.assign', compact('achievements', 'users'));
    }

    public function assign(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'achievement_id' => ['required', 'exists:achievements,id'],
            'notify_email' => ['nullable'],
        ]);

        $user = User::find($request->user_id);

        $user->achievements->attach($request->achievement_id);

        if ($request->has('notify_email')) {
            //
        }

        return redirect()->route('webmaster.achievements.index')->with('toast_success', __('messages.achievements.assigned'));
    }
}
