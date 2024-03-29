<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
  public function __invoke(Newsletter $newsletter)
  {
    request()->validate(['email' => ['required', 'email']]);
    try {
      // TODO Add mailer
      // $newsletter->subscribe(request('email'));
    } catch (Exception $e) {
      ValidationException::withMessages([
        'email' => 'This email could not be added to our newsletter'
      ]);
    }

    return redirect('/')
      ->with('success', 'You are now signed up for our newsletter!');
  }
}
