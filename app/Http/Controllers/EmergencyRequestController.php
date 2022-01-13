<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmergencyRequest;
use App\Models\Donor;
use App\Models\BloodBank;
use DB;
use App\Events\GetNotified;

class EmergencyRequestController extends Controller
{
    public function emergencyRequests(Request $request)
    {
        try {
            $requested = collect($request);
            $test = EmergencyRequest::create($requested->toArray());
            broadcast(new GetNotified('Emergency Request Arrived'));
            return response()->json($test, 200);

        } catch (Exception $e) {

                return response('error occured', 422);
        }
    }
    
    public function getEmergencyRequests(Request $request){
        try{
            return response()->json([
                'emergencyRequest' =>  EmergencyRequest::where('date', $request['date'])->get(),
                'donorCount' => Donor::where('ngo_id', auth()->user()->id)->count(),
                'bloodBags' => BloodBank::where('ngo_id', auth()->user()->id)->count(),
            ], 200);

        } catch (Exception $e) {

            return response('error occured', 422);
        }
    }
}