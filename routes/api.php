<?php

use App\Http\Controllers\DonorController;
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
// Route::post('delete',[DonorController::class,'destroy']);
Route::get('requests', function () {
    $requests = App\Models\Request::all();
    $count =App\Models\Donor::count();
    return  ["emergencyRequest" => $requests, "donorCount" => $count];
});
Route::resource('donors',DonorController::class);
