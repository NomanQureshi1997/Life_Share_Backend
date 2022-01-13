<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ngo;
use App\Models\User;

class NgoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|unique:ngos,email',
            'name'  => 'required',
            'contact' => 'required',
            'location' => 'required',
            'registration_id' => 'required',
            'type' => 'required',
            'password' => 'required|string|min:6'
        ]);
        
        $ngo = Ngo::create([
            'name'  => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'location' => $request->location,
            'registration_id' => $request->registration_id,
            'type' => $request->type

        ]);

        $user = User::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'ngo_id' =>  $ngo->id
        ]);

        return response([
            'token' => $user->createToken('tokens')->plainTextToken,
            'message'=>"Ngo Register Successfully"
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
