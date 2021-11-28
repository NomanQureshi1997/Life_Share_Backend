<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmergencyRequest;

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
}
//9jdMFRnOPVaogJ6jFd44zEDG3XmwNo4mm37GP6XC