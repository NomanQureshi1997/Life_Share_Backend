<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmergencyRequest;
use App\Models\Donor;
use DB;
class EmergencyRequestController extends Controller
{
    public function emergencyRequests(Request $request)
    {
        try {
            $requested = collect($request);
            $test = EmergencyRequest::create($requested->toArray());
            return response()->json($test, 200);

        } catch (Exception $e) {

                return response('error occured', 422);
        }
    }
    
    public function getEmergencyRequests(){
        try{

            return response()->json([
                'emergencyRequest' =>  EmergencyRequest::all(),
                'donorCount' => Donor::count()
            ], 200);

        } catch (Exception $e) {

            return response('error occured', 422);
        }
    }
}
//9jdMFRnOPVaogJ6jFd44zEDG3XmwNo4mm37GP6XC