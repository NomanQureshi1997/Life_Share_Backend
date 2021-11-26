<?php

use App\Models\Ngo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\AuthenticationController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/create-account', [AuthenticationController::class, 'createAccount']);
//login user
Route::post('/signin', [AuthenticationController::class, 'signin']);
//using middleware
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    Route::post('/sign-out', [AuthenticationController::class, 'logout']);

    Route::post('registerngo',  function() {
        $ngo = new Ngo();
        $ngo->name = 'Sundas';
        $ngo->email = 'sundas@gmail.com';
        $ngo->phone = '03069056234';
        $ngo->password ='myfriend1997';
        $ngo->location ='samnabad';
        $ngo->registration_id = '1564';
        $ngo->type = 'nog';
        $ngo->save();
        return response()->json(['message'=>"Donor Successfully",'action'=>'redirect','do'=>url('donors')],200);
    });
    
    
    Route::resource('donors',DonorController::class);
});



