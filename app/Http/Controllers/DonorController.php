<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donor;
use Exception;

class DonorController extends Controller
{
    public function index()
    {
        $donors = Donor::all();
        return $donors;
    }
    public function store(Request $request)
    {
        try{
            $request->validate([
                'age' => 'required|integer|between:18,60',
                'name' => 'required',
                'phone' => 'required',
                'blood_group' => 'required',
            ]);
            $donor = new Donor();
            $donor->name = $request->name;
            $donor->blood_group = $request->blood_group;
            $donor->phone = $request->phone;
            $donor->age = $request->age;
            $donor->ngo_id = 1;
            $donor->is_active = 1;
            $donor->save();
        return response()->json(['message'=>"Donor Successfully",'action'=>'redirect','do'=>url('donors')],200);

        }
        catch(Exception $e)
		{
			return response()->json(['message' => $e->getMessage()], 422);
		}

    }
    public function update(Request $request)
    {
        try{
            $request->validate([
                'age' => 'required|integer|between:18,60',
                'name' => 'required',
                'phone' => 'required',
                'blood_group' => 'required',
            ]);
            Donor::where('id',$request->id)->update(  $request->all() );
            return response()->json(['message'=>"Donor Updated Successfully",'action'=>'redirect','do'=>url('/donors')],200);
        }
        catch(Exception $e)
		{
			return response()->json(['message' => $e->getMessage()], 403);
		}

    }
    public function destroy(Request $request, $id)
    {
        try{
            // return "true";
        // return $request;
        Donor::find($id)->delete($id);
        return "success";
        } catch(Exception $e)
		{
			return response()->json(['message' => $e->getMessage()], 403);
		}
    }
    public function test(Request $request)
    {
        try{
        return "success";
        } catch(Exception $e)
		{
			return response()->json(['message' => $e->getMessage()], 403);
		}
    }
}
