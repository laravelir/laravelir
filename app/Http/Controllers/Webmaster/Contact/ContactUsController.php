<?php

namespace App\Http\Controllers\Webmaster\Contact;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Response;

class ContactUsController extends Controller
{

    public function index()
    {
        $contacts = ContactUs::latest()->paginate(15);
        return view('webmaster.miscellaneous.contactus.messages.index', compact('contacts'));
    }

    public function show(ContactUs $contact)
    {
        return view('webmaster.miscellaneous.contactus.messages.show', compact('contact'));
    }

    public function destroy(ContactUs $contact)
    {
        $contact->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
