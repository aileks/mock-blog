<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke()
    {
        request()->validate(['email' => 'required|email']);

        try {
            $newsletter = new Newsletter();
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.',
            ]);
        }

        return redirect('/')->with('success', 'You are now signed up for our newsletter!');
    }
}
