<?php

namespace App\Http\Controllers\Webmaster\Skill;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class SkillController extends Controller
{

    public function index()
    {
        $this->seo()->setTitle('مهارت ها');

        $skills = Skill::latest()->paginate(10);

        return view('webmaster.skills.all', compact('skills'));
    }

    public function create()
    {
        $this->seo()->setTitle('ثبت مهارت جدید');

        $skills = Skill::latest()->get();

        return view('webmaster.skills.create', compact('skills'));
    }

    public function store(Request $request)
    {

        $skill = Skill::create([
            'parent_id' => $request->parent_id,
            'active' => $request->boolean('active') ? true : false,
        ]);

        $skill->title = [
            'fa' => $request->title,
            'en' => $request->en_title,
        ];

        $skill->save();


        return redirect()->route('webmaster.skills.index')->with([
            'message' => 'مهارت ثبت شد',
            'type' => 'success'
        ]);
    }

    public function show(Skill $skill)
    {
        return view('webmaster.skills.show', compact('skill'));
    }

    public function edit(Skill $skill)
    {
        $this->seo()->setTitle('ویرایش مهارت');

        $skills = Skill::where('id', '!=', $skill->id)->get();

        return view('webmaster.skills.edit', compact('skill', 'skills'));
    }
    public function update(Request $request, Skill $skill)
    {
        $skill->update([
            'parent_id' => $request->parent_id,
            'active' => $request->boolean('active') ? true : false,
        ]);

        $skill->title = [
            'fa' => $request->title,
            'en' => $request->en_title,
        ];

        $skill->save();

        return redirect()->route('webmaster.skills.index')->with([
            'message' => 'مهارت ویرایش شد',
            'type' => 'success'
        ]);
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
        // return redirect()->route('webmaster.skills.index')->with('success', 'مهارت مورد نظر با موفقیت حذف شد.');
    }
}
