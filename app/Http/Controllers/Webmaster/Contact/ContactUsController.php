<?php

namespace App\Http\Controllers\Webmaster\Contact;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Response;

class ContactUsController extends Controller
{

    public function index()
    {
        $this->seo()->setTitle('پیام های تماس با ها');

        $contacts = ContactUs::latest()->get();
        return view('webmaster.contacts.all', compact('contacts'));
    }

    public function show(ContactUs $contact)
    {
        $this->seo()->setTitle('پیام های تماس با ها');

        return view('webmaster.contacts.show', compact('contact'));
    }

    public function destroy(ContactUs $contact)
    {
        $contact->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
