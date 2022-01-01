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
            $user = EmergencyRequest::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'phone_no' => $request['phone_no'],
                'message' => $request['message'],
                'location' => $request['location'],
                'blood_group' => $request['blood_group'],
                'guard_name' => $request['guard_name']
            ]);

            return response('success', 200);

        } catch (Exception $e) {

                return response('error occured', 422);
        }
    }
    public function getEmergencyRequests(){
        try{

            $requestData = EmergencyRequest::all();
            $donorsCount =  Donor::count();
            $dataForm = [];
            foreach($requestData as $data){
                array_push($dataForm , [
                    'id'       => $data->id,
                    'action'   => $data->created_at,
                    'headline' => $data->email,
                    'subtitle' => $data->message,
                    'title'    => $data->name,
                    'location' => $data->location,
                    'contact'  => $data->phone_no
                ]);
            }
            return response(['emergencyRequest' => $dataForm, 'donorCount' => $donorsCount], 200);

        } catch (Exception $e) {

            return response('error occured', 422);
        }
    }
}
//9jdMFRnOPVaogJ6jFd44zEDG3XmwNo4mm37GP6XC