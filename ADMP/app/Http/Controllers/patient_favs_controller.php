<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patient_fav;
use Hash;
use session;
use Alert;
use Exception;

class patient_favs_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function patientfavdoctor()  
    {
        $data=patient_fav::join('doctors','doctors.id','=','patient_favs.doctor_id')->join('cities','cities.id','=','doctors.city')->join('states','states.id','=','doctors.state')->where('patient_id','=',Session('patient_id'))->get();
        return view('patient.favourites',["patientfavdoctor_arr"=>$data]);
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
    public function patient_fav_doc($id)
    {
        $data=new patient_fav;
        $data->patient_id=Session('patient_id');
        $data->doctor_id=$id; 
        $res=$data->save();
        Alert::success('Done', 'You\'ve Successfully Add to Favourite Doctor');
        return back();
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
    public function patient_fav_doc_del($id)
    {
        $data=patient_fav::where('doctor_id','=',$id)->where('patient_id','=',Session('patient_id'))->delete();
        Alert::success('Done', 'You\'ve Successfully Remove Doctor');
        return back();
    }
}
