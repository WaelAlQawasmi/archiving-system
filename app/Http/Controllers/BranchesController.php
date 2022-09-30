<?php

namespace App\Http\Controllers;

use App\Models\Branches;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
       $data= Branches::all();
       $setting=['Trached'=>'branchesTrashed','delete'=>'branch.delete','open'=>'certer','add'=>route('branch.add')];
      return view('cards',['data' => $data ,'setting'=>$setting]);
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
      

        Branches::create([
            'name' => $request['name'],
            'phone' =>$request['phone'],
            'manegere' => $request['manegere'],
       
        ]);

        return redirect('branch');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branches  $branches
     * @return \Illuminate\Http\Response
     */
    public function show(Branches $branches)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branches  $branches
     * @return \Illuminate\Http\Response
     */
    public function edit(Branches $branches)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branches  $branches
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
        $Branch =Branches::find($id);
        // Getting values from the blade template form
        $Branch->name =  $request->get('name');
        $Branch->manegere = $request->get('manegere');
        $Branch->phone = $request->get('phone');
        $Branch->save();
 
        return redirect('branch')->with('status', 'تم التعديل بنجاح');  // -> resources/views/stocks/index.blade.php
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branches  $branches
     * @return \Illuminate\Http\Response
     */

     
    public function destroy( $id)
    {
       Branches::find($id)->delete();
       return redirect('branch')->with('status', 'تم الحذف بنجاح');  // -> resources/views/stocks/index.blade.php
    }


    
    public function hdelete($id)
    {
        $Branche= Branches::withTrashed()->where('id' ,  $id )->first() ;
        $Branche->forceDelete();
        return redirect()->back() ;
    }

    public function restore( $id)
    {
        $Branche = Branches::withTrashed()->where('id' ,  $id )->first() ;
        $Branche->restore();
        return redirect()->back() ;
    }


    public function branchesTrashed()
    {
       
        $setting=['delete'=>'branch.hdelete'];
        $data= Branches::onlyTrashed()->get();
        return view('cards',['data' => $data,'setting'=>$setting]);
    }
}
