<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company_slots;
use App\Models\doctor;
use Alert;
use Exception;

class company_slots_controller extends Controller
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
        return view('doctor.company-schedule-timings');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
            $data=new company_slots;
            $data->doc_id=Session('doctor_id');
            $data->cday=implode(",",$request->cday);
            $data->cno_slots=$request->cno_slots;
            $data->cslot_morning_to=$request->cslot_morning_to;
            $data->cslot_morning_from=$request->cslot_morning_from;
            $data->cslot_afternoon_to=$request->cslot_afternoon_to;
            $data->cslot_afternoon_from=$request->cslot_afternoon_from;
            $data->cslot_evening_to=$request->cslot_evening_to;
            $data->cslot_evening_from=$request->cslot_evening_from;
            $data->save();
            Alert::success('Done', 'You\'ve Successfully Add Schedule');
        return redirect('doctor-company-schedule-timings');
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
