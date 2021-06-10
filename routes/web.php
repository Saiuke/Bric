<?php

use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationMail;

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

Route::get('/', function () {
   return view('reviews.create');
});

Route::resource('reviews', 'ReviewController');
Route::get('/send-mail', function () {
   Mail::to('ezequias@hotmail.com.br')->send(new NotificationMail("A review was updated.")); 
});
