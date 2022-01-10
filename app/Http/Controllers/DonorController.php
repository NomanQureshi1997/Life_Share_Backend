<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donor;
use Illuminate\Support\Facades\Auth;
use Exception;

class DonorController extends Controller
{
    public function index()
    {
        $donors = Donor::where('ngo_id', auth()->user()->id)->get();
        return $donors;
    }
    public function store(Request $request)
    {
            $request->validate([
                'email' => 'required|unique:donors',
            ]);
            Donor::create([ 
                'name' => $request['name'],
                'age' =>  $request['age'],
                'weight' => $request['weight'],
                'blood' =>  $request['blood'],
                'gender' => $request['gender'],
                'address' => $request['address'],
                'city' =>  $request['city'],
                'phone' => $request['phone'],
                'email' => $request['email'],
                'last_donated' => $request['last_donated'],
                'ngo_id' => auth()->user()->id
            ]);

            return response()->json(['message'=>"Donor Successfully"],200);
    }
    public function update(Request $request)
    {
        try{
            $request->validate([
                'email' => 'required|unique:donors,email,'.$request->id,
            ]);
            $test = Donor::where('id',$request->id)->update( collect( $request->all())->toArray() );
            return response()->json(['message'=>"Donor Updated Successfully"],200);
        }
        catch(Exception $e)
		{
			return response()->json(['message' => $e->getMessage()], 403);
		}

    }
    public function destroy(Request $request, $id)
    {
        try{
            Donor::find($id)->delete($id);
            return response()->json(['message'=>"Donor Deleted Successfully"],200);
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
