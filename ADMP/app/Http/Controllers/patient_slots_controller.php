<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patient_slots;
use App\Models\doctor;
use App\Models\patient;
use App\Models\book_by_otp;
use App\Models\appointments;
use App\Mail\otp;
use Mail;
use Hash;
use Session;
use Alert;
use Exception;
use Illuminate\Database\QueryException;


class patient_slots_controller extends Controller
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

     ////////////////////////////////doctor panel///////////////////////////////////////
    public function create()
    {   
        $morningSunday=patient_slots::where('day','=','Sunday')->where('time','=','Morning')->where('doc_id','=',Session('doctor_id'))->get();
        $afternoonSunday=patient_slots::where('day','=','Sunday')->where('time','=','afternoon')->where('doc_id','=',Session('doctor_id'))->get();
        $eveningSunday=patient_slots::where('day','=','Sunday')->where('time','=','evening')->where('doc_id','=',Session('doctor_id'))->get();
        $morningMonday=patient_slots::where('day','=','Monday')->where('time','=','Morning')->where('doc_id','=',Session('doctor_id'))->get();
        $afternoonMonday=patient_slots::where('day','=','Monday')->where('time','=','afternoon')->where('doc_id','=',Session('doctor_id'))->get();
        $eveningMonday=patient_slots::where('day','=','Monday')->where('time','=','evening')->where('doc_id','=',Session('doctor_id'))->get();
        $morningTuesday=patient_slots::where('day','=','Tuesday')->where('time','=','Morning')->where('doc_id','=',Session('doctor_id'))->get();
        $afternoonTuesday=patient_slots::where('day','=','Tuesday')->where('time','=','afternoon')->where('doc_id','=',Session('doctor_id'))->get();
        $eveningTuesday=patient_slots::where('day','=','Tuesday')->where('time','=','evening')->where('doc_id','=',Session('doctor_id'))->get();
        $morningWednesday=patient_slots::where('day','=','Wednesday')->where('time','=','Morning')->where('doc_id','=',Session('doctor_id'))->get();
        $afternoonWednesday=patient_slots::where('day','=','Wednesday')->where('time','=','afternoon')->where('doc_id','=',Session('doctor_id'))->get();
        $eveningWednesday=patient_slots::where('day','=','Wednesday')->where('time','=','evening')->where('doc_id','=',Session('doctor_id'))->get();
        $morningThursday=patient_slots::where('day','=','Thursday')->where('time','=','Morning')->where('doc_id','=',Session('doctor_id'))->get();
        $afternoonThursday=patient_slots::where('day','=','Thursday')->where('time','=','afternoon')->where('doc_id','=',Session('doctor_id'))->get();
        $eveningThursday=patient_slots::where('day','=','Thursday')->where('time','=','evening')->where('doc_id','=',Session('doctor_id'))->get();
        $morningFriday=patient_slots::where('day','=','Friday')->where('time','=','Morning')->where('doc_id','=',Session('doctor_id'))->get();
        $afternoonFriday=patient_slots::where('day','=','Friday')->where('time','=','afternoon')->where('doc_id','=',Session('doctor_id'))->get();
        $eveningFriday=patient_slots::where('day','=','Friday')->where('time','=','evening')->where('doc_id','=',Session('doctor_id'))->get();
        $morningSaturday=patient_slots::where('day','=','Saturday')->where('time','=','Morning')->where('doc_id','=',Session('doctor_id'))->get();
        $afternoonSaturday=patient_slots::where('day','=','Saturday')->where('time','=','afternoon')->where('doc_id','=',Session('doctor_id'))->get();
        $eveningSaturday=patient_slots::where('day','=','Saturday')->where('time','=','evening')->where('doc_id','=',Session('doctor_id'))->get();

        return view('doctor.patient-schedule-timings',[
            'morningSunday'=>$morningSunday,
            'afternoonSunday'=>$afternoonSunday,
            'eveningSunday'=>$eveningSunday,
            'morningMonday'=>$morningMonday,
            'afternoonMonday'=>$afternoonMonday,
            'eveningMonday'=>$eveningMonday,
            'morningTuesday'=>$morningTuesday,
            'afternoonTuesday'=>$afternoonTuesday,
            'eveningTuesday'=>$eveningTuesday,
            'morningWednesday'=>$morningWednesday,
            'afternoonWednesday'=>$afternoonWednesday,
            'eveningWednesday'=>$eveningWednesday,
            'morningThursday'=>$morningThursday,
            'afternoonThursday'=>$afternoonThursday,
            'eveningThursday'=>$eveningThursday,
            'morningFriday'=>$morningFriday,
            'afternoonFriday'=>$afternoonFriday,
            'eveningFriday'=>$eveningFriday,
            'morningSaturday'=>$morningSaturday,
            'afternoonSaturday'=>$afternoonSaturday,
            'eveningSaturday'=>$eveningSaturday,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $time=$request->time;
        $day=$request->day;
        $no_slots=$request->no_slots;
        $min=$request->min;
        $start_time=$request->start_time;
        date_default_timezone_set('asia/calcutta');
        $i=0;
        while($i<$no_slots)
        {   
            $data=new patient_slots;
            $data->time=$time;    
            $data->doc_id=Session('doctor_id');
            $data->day=$day;
            $data->slot_timing=date('H:i',strtotime($min,strtotime($start_time)));
            $start_time=date('H:i',strtotime($min,strtotime($start_time)));
            $data->save();
            $i++;
        }
        Alert::success('Done', 'You\'ve Successfully Add Schedule');
        return redirect('doctor-patient-schedule-timings');
    }


    /////////////////////////////////////patient panel//////////////////////////////////////////

    public function showpatient(Request $request, $id)
    {
        $doctordata=doctor::find($id);
        $doc_id=$doctordata->id;
        $searchbydate=$request->searchbydate;
        if($searchbydate!="")
        {        
            $timestamp = strtotime($searchbydate);
            $day=date('l', $timestamp); 
            $Morningsearchdate=patient_slots::where('day','=',$day)->where('time','=','Morning')->where('doc_id','=',$doc_id)->get();
            $afternoonsearchdate=patient_slots::where('day','=',$day)->where('time','=','afternoon')->where('doc_id','=',$doc_id)->get();
            $eveningsearchdate=patient_slots::where('day','=',$day)->where('time','=','evening')->where('doc_id','=',$doc_id)->get();
        }
        else
        {
            $current=date('d-m-Y');
            $timestamp = strtotime($current);
            $day=date('l', $timestamp); 
            $Morningsearchdate=patient_slots::where('day','=',$day)->where('time','=','Morning')->where('doc_id','=',$doc_id)->get();
            $afternoonsearchdate = patient_slots::where('day', '=', $day)->where('time', '=', 'afternoon')->where('doc_id', '=', $doc_id)->get();
            $eveningsearchdate=patient_slots::where('day','=',$day)->where('time','=','evening')->where('doc_id','=',$doc_id)->get();
        }

        return view('patient.booking',[
            'Morningsearchdate'=>$Morningsearchdate,
            'afternoonsearchdate'=>$afternoonsearchdate,
            'eveningsearchdate'=>$eveningsearchdate,
            'value'=>$searchbydate,
            'doctordata'=>$doctordata,
            'day'=>$day,
        ]);
    }

    public function book_app_sess(Request $request)
    {   
         $slot_timing=$request->slot_timing;
         $doc_id=$request->doc_id;
         $appointment_date=$request->appointment_date;
         
        
        $request->Session()->put('slot_timing_session',$slot_timing);
        $request->Session()->put('appo_date_session',$appointment_date);
        $request->Session()->put('book_doc_session',$doc_id);
        
        return redirect('/book_appointment');
    }


    public function book_appointment(Request $request)
    {  
       if(session('slot_timing_session'))
        {
            $slot_timing=Session('slot_timing_session');
            $appointment_date=Session('appo_date_session');
            $doc_id=Session('book_doc_session');
            $patient_data=patient::where('id','=',Session('patient_id'))->first();
            $doctor_data=doctor::where('id','=',$doc_id)->first();

            return view('patient.book_appointment',['patient_data'=>$patient_data,'doctor_data'=>$doctor_data,'appointment_date'=>$appointment_date,'slot_timing'=>$slot_timing]);    
            
        }
        else
        {
            return redirect('/index');
        }
        
         
    }

    public function send_otp(Request $request)
    {
        $comment=$request->comment;
        $request->Session()->put('comment',$comment);

        $email=$request->email;
        $name=$request->name;
        $otp=rand(111111,999999);
        $request->Session()->put('ptbookotp',$otp);
        $data=['email'=>$email,'name'=>$name,'ptbookotp'=>Session('ptbookotp'),'body'=>"For Booking conform OTP first"];   
        Mail::to($email)->send(new otp($data));
        return redirect('/book_by_otp');
    }

    public function book_by_otp(Request $request)
    {
        if(session('ptbookotp'))
        {
            
            return view('patient.book_by_otp');
        }
        else
        {
            return view('patient.index');    
        }
        
    }

    public function matchotp(Request $request)
    {
        $userotp=$request->userotp;
        $ptbookotp=session('ptbookotp');
        if($userotp==$ptbookotp)
        {
           // $data->userotp=$request->userotp;
           // $data->ptbookotp=$request->ptbookotp;
            $data=new appointments;
            $data->time=session('slot_timing_session');
            $data->date=session('appo_date_session');
            $data->doc_id=session('book_doc_session');
            $data->patient_id=session('patient_id');
            $data->comment=session('comment');
            $data->save();

            Session()->pull('slot_timing_session');
            Session()->pull('appo_date_session');
            Session()->pull('book_doc_session');
            Session()->pull('comment');
            Alert::success('Congrats', 'You\'ve Successfully Booked Appointment ');
            
            return redirect('/index');


        }
        else
        {
            
            Alert::error('Error OTP', 'Entered OTP Does not match'); 
            return back();
        }
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
