<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloodRequest;

class BloodRequestController extends Controller
{
    public function bloodRequests(Request $request)
    {
        try {

            $user = BloodRequest::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'phone_no' => $request['phone_no'],
                'message' => $request['message'],
                'required_blood' => $request['required_blood'],
                'guard_name' => $request['guard_name']
            ]);

            return response('success', 200);


        } catch (Exception $e) {

            return response($e, 422);

        }
    }
}
// 'name' => $request['name'],
//             'email' => $request['email'],
//             'phone_no' => $request['phone_no'],
//             'message' => $request['message'],
//             'required_blood' => $request['required_blood'],
//             'location' => $request['location'], 
//             'guard_name' => $request['guard_name']