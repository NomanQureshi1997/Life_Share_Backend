<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloocBank;

class BloodBankController extends Controller
{
    public function bloodRequests(Request $request)
    {
        try {

            $user = BloodBank::create([
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
    public function getBloodRequestRequests(){
        
        try{

            $requestData = BloodRequest::all();
            $dataForm = [];
            foreach($requestData as $data){
                array_push($dataForm , [
                    'id'       => $data->id,
                    'action'   => $data->created_at,
                    'headline' => $data->email,
                    'subtitle' => $data->message,
                    'title'    => $data->name,
                    'requiredBlood' => $data->required_blood,
                    'contact'  => $data->phone_no
                ]);
            }
            return response( $dataForm, 200);

        } catch (Exception $e) {

            return response('error occured', 422);
        }
    }
}
