<?php

namespace App\Http\Controllers;
use App\Models\Branches;

use App\Models\Centers;
use Illuminate\Http\Request;

class CentersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data= Branches::find($id)->centers;
        $setting=['Trached'=>'centeresTrashed','delete'=>'certer.delete','open'=>'certer','add'=>route('certer.add',$id)];

        return view('cards',['data' => $data ,'setting'=>$setting,'id'=>$id]);
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
    public function store($id, Request $request)
    {
        Centers::create([
            'name'=>$request['name'],
            'phone' =>$request['phone'],
            'manegere' => $request['manegere'],
            'branches_id' =>$id
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Centers  $centers
     * @return \Illuminate\Http\Response
     */
    public function show(Centers $centers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Centers  $centers
     * @return \Illuminate\Http\Response
     */
    public function edit(Centers $centers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Centers  $centers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Centers $centers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Centers  $centers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Centers::find($id)->delete();
        return redirect('branch')->with('status', 'تم الحذف بنجاح');  // -> resources/views/stocks/index.blade.php
    }

  

    
    public function hdelete($id)
    {
        $Branche= Centers::withTrashed()->where('id' ,  $id )->first() ;
        $Branche->forceDelete();
        return redirect()->back() ;
    }

    public function restore( $id)
    {
        $Branche = Centers::withTrashed()->where('id' ,  $id )->first() ;
        $Branche->restore();
        return redirect()->back() ;
    }


    public function centeresTrashed()
    {

   
        $setting=['delete'=>'certer.hdelete'];
        $data= Centers::onlyTrashed()->get();
        return view('cards',['data' => $data,'setting'=>$setting]);
    }
}
