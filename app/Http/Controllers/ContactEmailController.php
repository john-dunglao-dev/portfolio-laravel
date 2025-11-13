<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactAuthorForm;
use App\Mail\ContactAuthorMail;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class ContactEmailController extends Controller
{
    public function mailAuthor(ContactAuthorForm $request)
    {
        $authorEmail = config('contact_email.author_email');

        if (!$authorEmail) {
            return response()->json(['error' => 'Author email is not configured.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        Mail::to($authorEmail)->send(new ContactAuthorMail(
            $request->validated('name'),
            $request->validated('email'),
            $request->validated('subject'),
            $request->validated('message')
        ));
        return response()->json(['message' => 'Email sent successfully.'], Response::HTTP_OK);
    }

    public function previewMail()
    {
        return new ContactAuthorMail(
            'John Doe',
            'john@example.com',
            'Test Subject',
            'This is a test message.'
        );
    }
}
