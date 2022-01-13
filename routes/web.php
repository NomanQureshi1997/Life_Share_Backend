<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonorController;
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

Route::get('/', function(){
    return view('dashboard');
});
Route::get('test', function () {
    // event(new App\Events\GetNotified());
    broadcast(new App\Events\GetNotified('test'));
    return "Event has been sent!";
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
