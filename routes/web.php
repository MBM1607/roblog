<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('newsletter', function () {
  request()->validate(['email' => ['required', 'email']]);

  $mailchimp = new \MailchimpMarketing\ApiClient();

  $mailchimp->setConfig([
    'apiKey' => config('services.mailchimp.key'),
    'server' => 'us6'
  ]);

  try {
    $mailchimp->lists->addListMember('d3c0c95629', [
      'email_address' => request('email'),
      'status' => 'subscribed'
    ]);
  } catch (\Exception $e) {
    ValidationException::withMessages([
      'email' => 'This email could not be added to our newsletter'
    ]);
  }

  return redirect('/')
    ->with('success', 'You are now signed up for our newsletter!');
});

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post');
Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store'])->middleware('auth');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');
