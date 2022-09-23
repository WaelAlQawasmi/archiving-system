<?php

namespace App\Http\Controllers;

use App\Models\user_profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function store(Request $data)
    {
         user_profile::create([
            'user_id' => $data['user_id'],
            'image' => $data['position'],
            'position' => $data['position'],
            'berthday' => $data['berthday'],
        ]);

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_profile  $user_profile
     * @return \Illuminate\Http\Response
     */
    public function show(user_profile $user_profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_profile  $user_profile
     * @return \Illuminate\Http\Response
     */
    public function edit(user_profile $user_profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user_profile  $user_profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_profile $user_profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_profile  $user_profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_profile $user_profile)
    {
        //
    }
}
