<?php

use App\Http\Controllers\DonorController;
use App\Models\Ngo;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('donors/', [DonorController::class,'index']);
// Route::post('formdata/', [DonorController::class,'store']);
// Route::get('donors/edit/{id}/', [DonorController::class,'edit']);
// Route::get('show/{id}/', [DonorController::class,'show']);
// Route::post('update', [DonorController::class,'update']);
// Route::delete('delete/{id}/', [DonorController::class,'destroy']);

// Route::delete('delete/{id}', [DonorController::class,'destroy']);
Route::post('registerngo',  function() {
    $ngo = new Ngo();
    $ngo->name = 'Sundas';
    $ngo->email = 'sundas@gmail.com';
    $ngo->phone = '03069056234';
    $ngo->registration_id = '1564';
    $ngo->type = 'nog';
    $ngo->save();
    return response()->json(['message'=>"Donor Successfully",'action'=>'redirect','do'=>url('donors')],200);
});
Route::get('requests', function () {
    $requests = App\Models\Request::all();
    $count =App\Models\Donor::count();
    return  ["emergencyRequest" => $requests, "donorCount" => $count];
});
Route::resource('donors',DonorController::class);
