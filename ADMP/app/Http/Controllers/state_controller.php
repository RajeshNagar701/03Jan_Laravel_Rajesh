<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\state;
use App\Models\citie;
use App\Models\area;
use Alert;
use Exception;

class state_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $state=state::all();
        $city=citie::all();
        $area=area::all();
        return view('admin.location',["state_arr"=>$state,"city_arr"=>$city,"area_arr"=>$area]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
 
    ///state
    public function addstate(Request $request)
    {
        $data=$request->validate([
            'state_name'=>'required', 
        ]);
        $data=new state;
        $data->state_name=$request->state_name;

        $data->save();
        Alert::success('Done', 'You\'ve Successfully Add State');
        return redirect('/admin-location');
    }

    ////city
    public function addcity(Request $request)
    {
        $data=$request->validate([
            'state'=>'required',
            'city_name'=>'required',
            ]);
        $data=new citie;
        $data->sid=$request->state;
        $data->city_name=$request->city_name;

        $data->save();
        Alert::success('Done', 'You\'ve Successfully Add City');
        return redirect('/admin-location');
    }

    ////area
    public function addarea(Request $request)
    {
        $data=$request->validate([
            'city'=>'required',
            'area_name'=>'required',
         ]);
        $data=new area;
        $data->city_id=$request->city;
        $data->area_name=$request->area_name;

        $data->save();
        Alert::success('Done', 'You\'ve Successfully Add Area');
        return redirect('/admin-location');
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
    public function statedelete($id)
    {
        $data=state::find($id);
        $data->delete();
        Alert::success('Done', 'You\'ve Successfully Delete State');
        return redirect('admin-location');
    }

    public function citydelete($id)
    {
        $data=citie::find($id);
        $data->delete();
        Alert::success('Done', 'You\'ve Successfully Delete City');
        return redirect('admin-location');
    }

    public function areadelete($id)
    {
        $data=area::find($id);
        $data->delete();
        Alert::success('Done', 'You\'ve Successfully Delete Area');
        return redirect('admin-location');
    }

}
