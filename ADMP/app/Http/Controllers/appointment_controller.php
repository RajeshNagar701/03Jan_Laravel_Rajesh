<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\appointments;
use App\Models\doctor;
use App\Models\patient;
use hash;
use session;
use Alert;
use Exception;

class appointment_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    ////////////////////////////////////////////////Doctor Panel////////////////////////////////////////////////////
    public function index()
    {
        $today=date('Y-m-d');
        $data_today=appointments::join('patients','patients.id','=','appointments.patient_id')
        ->where('doc_id','=',Session('doctor_id'))
        ->where('appointment_status','=','Pending')
        ->where('date','=',$today)->get(['appointments.*','patients.name','patients.mobileno','patients.gender','patients.ptprofile_img']);
        $data_upcoming=appointments::join('patients','patients.id','=','appointments.patient_id')
        ->where('doc_id','=',Session('doctor_id'))
        ->where('appointment_status','=','Pending')
        ->where('date','>',$today)->get();
        return view('doctor.doctor-dashboard',["appointments_arr"=>$data_today,"appointments_upc_arr"=>$data_upcoming]);
    }

    public function patient_appointment()
    {
        $data=appointments::join('patients','patients.id','=','appointments.patient_id')->where('doc_id','=',Session('doctor_id'))->orderBy('date')->get();
        return view('doctor.appointments',["appointments_arr"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //////////////////////////////////////////////Patient Panel///////////////////////////////////////////////////

    public function doctor_appointment()
    {
        $data=appointments::join('doctors','doctors.id','=','appointments.doc_id')->join('specialists','specialists.id','=','doctors.specialist_id')->where('patient_id','=',Session('patient_id'))->get();
        return view('patient.patient-dashboard',["doc_appointments_arr"=>$data]);
    }

    public function create()
    {
        return view('patient.book_appointment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new appointments;
        $data->date=$request->date;
        $data->comment=$request->comment;
        $data->time=$request->time;

        $data=doctor::where("id","=",$doc_id)->get();
        $data->patient_id=Session('patient_id');
        $res=$data->save();
      
       Alert::success('Done', 'You\'ve Successfully Add Appointment');
       return redirect('patient.book_by_otp');
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
