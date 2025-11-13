<?php

namespace App\Http\Controllers;

use App\Mail\ContactAuthorMail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class ContactEmailController extends Controller
{
    public function mailAuthor(Request $request)
    {
        $authorEmail = config('contact_email.author_email');

        if (!$authorEmail) {
            return response()->json(['error' => 'Author email is not configured.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        // Mail::to($authorEmail)->send(new ContactAuthorMail());

        Mail::raw('This is a test email body.', function ($message) use ($authorEmail) {
            $message->to($authorEmail)
                    ->subject('Contact Form Submission');
        });
        return response()->json(['message' => 'Email sent successfully.'], Response::HTTP_OK);
    }
}
