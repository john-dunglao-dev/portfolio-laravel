<?php

namespace App\Http\Controllers;

use App\Notifications\ContactEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;

class ContactEmailController extends Controller
{
    public function mailAuthor(Request $request)
    {
        $authorEmail = config('contact_email.author_email');

        if (!$authorEmail) {
            return response()->json(['error' => 'Author email is not configured.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        Notification::send($authorEmail, new ContactEmailNotification($request->all()));
    }
}
