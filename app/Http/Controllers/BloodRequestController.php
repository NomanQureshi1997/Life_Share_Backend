<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloodRequest;
use App\Events\GetNotified;

class BloodRequestController extends Controller
{
    public function bloodRequests(Request $request)
    {
        try {
            $requested = collect($request);
            $responce = BloodRequest::create($requested->toArray());
            broadcast(new GetNotified('Blood Request Arrived'));
            return response()->json($responce, 200);


        } catch (Exception $e) {

            return response($e, 422);

        }
    }
    public function getBloodRequestRequests(Request $request){
        
        try{
            return response()->json( BloodRequest::where('date', $request['date'])->get(), 200);

        } catch (Exception $e) {

            return response('error occured', 422);
        }
    }
}
