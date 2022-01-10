<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloodBank;

class BloodBankController extends Controller
{
    public function registerBloodBag(Request $request)
    {
        try {
            $request->validate([
                'donor_age' => 'required|integer|between:18,60',
                'donor_name' => 'required',
                'donor_weight' => 'required',
                'blood_group' => 'required',
                'bag_id' => 'required|unique:blood_banks',
                'donor_weight' => 'required|integer|between:50,120',

            ]);

            $user = BloodBank::create([
                'donor_name' => $request['donor_name'],
                'donor_age' => $request['donor_age'],
                'donor_weight' => $request['donor_weight'],
                'phone_no' => $request['phone_no'],
                'blood_group' => $request['blood_group'],
                'is_accpeted' => $request['is_accpeted'],
                'bag_id' => $request['bag_id'],
                'date' => date('Y-m-d'),
                'ngo_id' => auth()->user()->id
            ]);

            return response('success', 200);


        } catch (Exception $e) {

            return response($e, 422);

        }
    }

    public function getBloodBags(){
        
        try{
            return response(BloodBank::where('ngo_id', auth()->user()->id)->get(), 200);

        } catch (Exception $e) {

            return response('error occured', 422);
        }
    }

    public function destroy(Request $request)
    {
        try{
            BloodBank::find($request['id'])->delete();
            return "success";
        } catch(Exception $e)
		{
			return response()->json(['message' => $e->getMessage()], 403);
		}
    }

    public function update(Request $request)
    {
        try{
            $request->validate([
                'donor_age' => 'required|integer|between:18,60',
                'donor_name' => 'required',
                'donor_weight' => 'required',
                'blood_group' => 'required',
                'bag_id' => 'required',
                'donor_weight' => 'required|integer|between:50,120',
            ]);
            BloodBank::where('id',$request->id)->update(  $request->all() );
            return response()->json(['message'=>"Bag Updated Successfully"],200);
        }
        catch(Exception $e)
		{
			return response()->json(['message' => $e->getMessage()], 403);
		}

    }
}
