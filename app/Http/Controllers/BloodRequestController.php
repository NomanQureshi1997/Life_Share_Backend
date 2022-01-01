<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloodRequest;

class BloodRequestController extends Controller
{
    public function bloodRequests(Request $request)
    {
        try {
            $requested = collect($request);
            $test = BloodRequest::create($requested->toArray());

            return response($test, 200);


        } catch (Exception $e) {

            return response($e, 422);

        }
    }
    public function getBloodRequestRequests(){
        
        try{
            return response()->json( BloodRequest::all(), 200);

        } catch (Exception $e) {

            return response('error occured', 422);
        }
    }
}
