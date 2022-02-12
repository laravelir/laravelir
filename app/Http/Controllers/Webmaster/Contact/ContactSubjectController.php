<?php

namespace App\Http\Controllers\Webmaster\Contact;

use App\Http\Controllers\Controller;
use App\Models\ContactSubject;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactSubjectController extends Controller
{

    public function index()
    {
        $this->seo()->setTitle('موضوع تماس با ما ها');

        $subjects = ContactSubject::latest()->paginate(10);
        return view('webmaster.contact-subjects.all', compact('subjects'));
    }

    public function create()
    {
        $this->seo()->setTitle('ثبت موضوع تماس با ما جدید');

        return view('webmaster.subjects.create');
    }

    public function store(Request $request)
    {
        $subject = ContactSubject::create([
            'active' => $request->boolean('active') ? true : false,
        ]);

        $subject->title = [
            'fa' => $request->title,
            'en' => $request->en_title,
        ];
        $subject->save();

        return redirect()->route('webmaster.contact-subjects.index')->with([
            'message' => 'دپارتمان ثبت شد',
            'type' => 'success'
        ]);
    }

    public function show(ContactSubject $subject)
    {
        $this->seo()->setTitle('جزییات موضوع تماس با ما ');

        return view('webmaster.contact-subjects.show', compact('country'));
    }

    public function edit(ContactSubject $subject)
    {
        $this->seo()->setTitle('ویرایش موضوع تماس با ما');

        return view('webmaster.contact-subjects.edit', compact('subject'));
    }

    public function update(Request $request, ContactSubject $subject)
    {
        $subject->update(
            [
                'active' => $request->boolean('active') ? true : false,
            ]
        );
        $subject->title = [
            'fa' => $request->title,
            'en' => $request->en_title,
        ];
        $subject->save();
        return redirect()->route('webmaster.contact-subjects.index')->with([
            'message' => 'دپارتمان ویرایش شد',
            'type' => 'success'
        ]);
    }

    public function destroy(ContactSubject $subject)
    {
        $subject->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
