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
        $subjects = ContactSubject::latest()->paginate(10);
        return view('webmaster.miscellaneous.contactus.subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('webmaster.miscellaneous.contactus.subjects.create');
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

        return redirect()->route('webmaster.subjects.index')->with('toast_success', __('messages.contacts.subjects.updated'));
    }

    public function show(ContactSubject $subject)
    {
        return view('webmaster.miscellaneous.contactus.subjects.show', compact('country'));
    }

    public function edit(ContactSubject $subject)
    {
        return view('webmaster.miscellaneous.contactus.subjects.edit', compact('subject'));
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
        return redirect()->route('webmaster.subjects.index')->with('toast_success', __('messages.contacts.subjects.updated'));
    }

    public function destroy(ContactSubject $subject)
    {
        $subject->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
