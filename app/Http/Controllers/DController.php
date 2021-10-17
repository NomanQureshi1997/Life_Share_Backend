<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDonorRequest;
use Illuminate\Http\Request;
use App\Models\Donor;
use DB;
use Exception;


class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct()
     {

    }
    public function index()
    {
        $donors = Donor::all();
        return $donors;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDonorRequest $request)
    {
        // DB::beginTransaction();
        try{
            $donor = new Donor();
            $donor->name = $request->name;
            $donor->blood_group = $request->blood_group;
            $donor->phone = $request->phone;
            $donor->age = $request->age;
            $donor->ngo_id = 1;
            $donor->is_active = 1;
            $donor->save();

        }
        catch(Exception $e)
		{
			// DB::rollBack();

			return response()->json(['message' => $e->getMessage()], 403);
		}
		// DB::commit();
        return response()->json(['message'=>"Donor Successfully",'action'=>'redirect','do'=>url('donors')],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donor = Donor::find($id);
        return $donor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donor = Donor::find($id);
        return $donor;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // DB::beginTransaction();
        try{
            return $request;
            // $donor = Donor::find($id);
            // $donor->name = $request->name;
            // $donor->blood_group = $request->blood_group;
            // $donor->phone = $request->phone;
            // $donor->age = $request->age;
            // $donor->is_active = $donor->is_active?$donor->is_active:1;
            // $donor->active_date = Null;
            // $donor->save();
        }
        catch(Exception $e)
		{
			// DB::rollBack();

			return response()->json(['message' => $e->getMessage()], 403);
		}
		// DB::commit();
        return response()->json(['message'=>"Donor Updated Successfully",'action'=>'redirect','do'=>url('/donors')],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Request $request)
    // {
    //     return $request->id;
    //     Donor::find($request->id)->delete($request->id);
    //     return "success";
    // }
}
