<?php

use App\Models\Ngo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BloodRequestController;
use App\Http\Controllers\EmergencyRequestController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\BloodBankController;
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

Route::get('/profile', function(Request $request) {
    return 'test';
});

Route::group(['middleware' => ['mobile-app']], function () {
    Route::post('/blood-request', [BloodRequestController::class, 'bloodRequests']);
    Route::post('/emergency-request', [EmergencyRequestController::class, 'emergencyRequests']);
});

//using middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
    
    

    Route::post('/sign-out', [AuthenticationController::class, 'signout']);

    Route::get('/get-emergency-request', [EmergencyRequestController::class, 'getEmergencyRequests']);
    Route::get('/get-blood-request', [BloodRequestController::class, 'getBloodRequestRequests']);
    Route::post('/update-user-profile', [AuthenticationController::class, 'updateProfile']);
    Route::post('/password-update', [AuthenticationController::class, 'passwordReset']);
    
    Route::post('/register-blood-bag', [BloodBankController::class, 'registerBloodBag']);
    Route::get('/get-blood-bag', [BloodBankController::class, 'getBloodBags']);
    Route::get('/delete-blood-bag', [BloodBankController::class, 'destroy']);
    Route::post('/update-blood-bag', [BloodBankController::class, 'update']);
    
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



