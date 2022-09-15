<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctor;
use App\Models\state;
use App\Models\citie;
use App\Models\area;
use App\Models\specialist;
use App\Models\service;
use App\Models\drspecialitie;
use App\Models\visitor_slots;
use App\Models\company_fav_doc;
use App\Models\patient_fav;
use Hash;
use session;
use Alert;
use Exception;

class doctor_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //////////////////////////////////////////admin panel////////////////////////////////////////////////
    public function index()
    {
        $data=doctor::join('specialists','specialists.id','=','doctors.specialist_id')->get();
		return view('admin.doctor-list',["doctor_arr"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
	 
    public function create()
    {
        $special_id_arr=specialist::all();
        $state_id_arr=state::all();
 
        return view('admin.add-doctor',["special_id_arr"=>$special_id_arr,"state_id_arr"=>$state_id_arr]);
    }
	
	
	public function getCity(Request $request)
    {
		$data['cities']=citie::where("sid","=",$request->sid)->get();
        return response()->json($data);	
        
    }
	public function getArea(Request $request)
    {
		$data['areas']=area::where("city_id","=",$request->city_id)->get();
        return response()->json($data);	
    }
	
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data=$request->validate([
            'first_name'=>'required|alpha',
            'last_name'=>'required|alpha',
            'short_tittle'=>'required',//check
            'email'=>'required|email|unique:doctors',
            //'gender'=>'required|in:male,female',//check
            'password'=>'required|string|unique:doctors|min:6',
            'dob'=>'required|date',
            'liacence_no'=>'required',//check
            'education'=>'required|regex:/[a-zA-z0-9\s]+/',
            'experience'=>'required|regex:/[a-zA-z0-9\s]+/',
            'hospital_name'=>'required|regex:/[a-zA-z0-9\s]+/',
            'dr_mobile'=>'required|numeric|digits:10|unique:doctors',
            'office_no'=>'required|alpha_num|string',
            'about'=>'required',
            'address'=>'required|max:200',
            'pincode'=>'required|numeric|digits:6',
            'day'=>'required',
            
            'consulting_fees'=>'required|numeric',
            'followup_fees'=>'required|numeric',
            'notification'=>'required|max:200',
            'specialist_id'=>'required',
            'state'=>'required',
            'city'=>'required',
            'area'=>'required',
            'profile_img'=>'required',
            'hospital_img'=>'required',
            'visit_card'=>'required',

        ]);

       

        $data=new doctor;
        
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->short_tittle=$request->short_tittle;
        $data->email=$request->email;
        $data->gender=$request->gender;
        $data->password=Hash::make($request->password);
        $data->dob=$request->dob;
        $data->liacence_no=$request->liacence_no;
        $data->education=$request->education;
        $data->experience=$request->experience;
        $data->hospital_name=$request->hospital_name;
        $data->dr_mobile=$request->dr_mobile;
        $data->office_no=$request->office_no;
        $data->about=$request->about;
        $data->address=$request->address;
        $data->pincode=$request->pincode;
        $data->google_map=$request->google_map;
        $data->day=implode(",",$request->day);
        $data->hospital_morning_to=$request->hospital_morning_to;
        $data->hospital_morning_from=$request->hospital_morning_from;
        $data->hospital_afternoon_to=$request->hospital_afternoon_to;
        $data->hospital_afternoon_from=$request->hospital_afternoon_from;
        $data->hospital_evening_to=$request->hospital_evening_to;
        $data->hospital_evening_from=$request->hospital_evening_from;
        $data->consulting_fees=$request->consulting_fees;
        $data->followup_fees=$request->followup_fees;
        $data->notification=$request->notification;

        $data->specialist_id=$request->specialist_id ;
        $data->state=$request->state;
        $data->city=$request->city;
        $data->area=$request->area;

        // img upload
		$file=$request->file('profile_img');  // get file
		$file_name=time()."_profile_img.".$request->file('profile_img')->getClientOriginalExtension();// make file name
		$file->move('upload/doctor',$file_name); //file name move upload in public		
		$data->profile_img=$file_name; // file name store in db

        // hospital upload
        $filesarr = [];
        if($request->hasfile('hospital_img'))
        {
            foreach($request->file('hospital_img') as $file)
            {
                $name = time().rand(111111,999999).'hospital_img.'.$file->extension();
                $file->move('upload/hospital/',$name);
                $filesarr[] = $name;       
            }
            $data->hospital_img=implode(",",$filesarr);
        }

        // visiting card upload
		$file3=$request->file('visit_card');  // get file
		$file_name3=time()."_visit_card_img.".$request->file('visit_card')->getClientOriginalExtension();// make file name
		$file3->move('upload/visitingcard',$file_name3); //file name move upload in public		
		$data->visit_card=$file_name3; // file name store in db

        $res=$data->save();
        Alert::success('Done', 'You\'ve Successfully Add Doctor');
        return redirect('admin-add-doctor');

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
        $data=doctor::find($id);
        $special_id_arr=specialist::all();
        $state_id_arr=state::all();
        $city_id_arr=citie::all();
        $area_id_arr=area::all();
        return view('admin.edit-doctor',["fetch"=>$data,"special_id_arr"=>$special_id_arr,"state_id_arr"=>$state_id_arr,"city_id_arr"=>$city_id_arr,"area_id_arr"=>$area_id_arr]);
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
        $data=$request->validate([
            'first_name'=>'alpha',
            'last_name'=>'alpha',
            //'short_tittle'=>'required',//check
            //'email'=>'required|email|unique:doctors',
            //'gender'=>'required|in:male,female',//check
            //'password'=>'required|string|unique:doctors|min:6',
            'dob'=>'date',
            //'liacence_no'=>'required',//check
            'education'=>'regex:/[a-zA-z0-9\s]+/',
            'experience'=>'regex:/[a-zA-z0-9\s]+/',
            'hospital_name'=>'regex:/[a-zA-z0-9\s]+/',
            'dr_mobile'=>'digits:10',
            'office_no'=>'alpha_num|string',
            //'about'=>'required',
            'address'=>'max:200',
            'pincode'=>'digits:6',
            //'day'=>'required',
            'consulting_fees'=>'numeric',
            'followup_fees'=>'numeric',
            'notification'=>'max:200',
            //'specialist_id'=>'required',
            //'state'=>'required',
            //'city'=>'required',
            //'area'=>'required',
            'profile_img'=>'mimes:jpeg,png,jpg,gif',
            //'hospital_img'=>'mimes:jpeg,png,jpg,gif',
            'visit_card'=>'mimes:jpeg,png,jpg,gif',

        ]);

        $data=doctor::find($id);
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->short_tittle=$request->short_tittle;
        $data->gender=$request->gender;
        $data->dob=$request->dob;
        $data->liacence_no=$request->liacence_no;
        $data->education=$request->education;
        $data->experience=$request->experience;
        $data->hospital_name=$request->hospital_name;
        $data->dr_mobile=$request->dr_mobile;
        $data->office_no=$request->office_no;
        $data->about=$request->about;
        $data->address=$request->address;
        $data->pincode=$request->pincode;
        $data->google_map=$request->google_map;
        $data->day=implode(",",$request->day);
        $data->hospital_morning_to=$request->hospital_morning_to;
        $data->hospital_morning_from=$request->hospital_morning_from;
        $data->hospital_afternoon_to=$request->hospital_afternoon_to;
        $data->hospital_afternoon_from=$request->hospital_afternoon_from;
        $data->hospital_evening_to=$request->hospital_evening_to;
        $data->hospital_evening_from=$request->hospital_evening_from;
        $data->consulting_fees=$request->consulting_fees;
        $data->followup_fees=$request->followup_fees;
        $data->notification=$request->notification;
        $old_img=$data->profile_img;
        $old_img2=$data->hospital_img;
        $old_img3=$data->visit_card;

        $data->specialist_id=$request->specialist_id ;
        $data->state=$request->state;
        $data->city=$request->city;
        $data->area=$request->area;

        //img upload
        if($request->hasFile('profile_img'))
		{
			$file=$request->file('profile_img');  // get file
			$file_name=time() . "_profile_img." . $request->file('profile_img')->getClientOriginalExtension();// make file name
			$file->move('upload/doctor',$file_name); //file name move upload in public		
			$data->profile_img=$file_name; // file name store in db
			unlink('upload/doctor/'.$old_img);
		}
      
        //Hospital image upload/multi img upload

        $filesarr = [];
        if($request->hasfile('hospital_img'))
        {
            foreach($request->file('hospital_img') as $file)
            {
                $name = time().rand(111111,999999).'hospital_img.'.$file->extension();
                $file->move('upload/hospital/',$name);
                $filesarr[] = $name;
                
            }
            $data->hospital_img=implode(",",$filesarr);
        }

         // visiting card upload
         if($request->hasFile('visit_card'))
         {
            $file3=$request->file('visit_card');  // get file
            $file_name3=time()."_visit_card_img.".$request->file('visit_card')->getClientOriginalExtension();// make file name
            $file3->move('upload/visitingcard',$file_name3); //file name move upload in public		
            $data->visit_card=$file_name3; // file name store in db
            unlink('upload/visitingcard/'.$old_img3);
         }

        $data->save();
        Alert::success('Done', 'You\'ve Successfully Update Doctor');
		return redirect('/admin-doctor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    

    public function destroy($id)
    {
        $data=doctor::find($id);
		$data->delete();
        Alert::success('Done', 'You\'ve Successfully Delete Doctor');
		return redirect('admin-doctor');
    }

////////////////////////doctor panel///////////////////////////////////////////////////////////////////
public function login(Request $request)
    {
        return view('doctor.login');
    }

    public function doctorlogin(Request $request)
    {
        $data=$request->validate([
            
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);

        $data=doctor::where("email","=",$request->email)->first();
        if($data)
        {
            if(Hash::check($request->password, $data->password))
            {
                $doctor_status=$data->doctor_status;
                if($doctor_status=="Unblock")
                {
                    $request->Session()->put('doctor_id',$data->id);
                    $request->Session()->put('email',$data->email);
                    $drname=$data->first_name." ".$data->last_name; 
                    $request->Session()->put('drname',$drname);
                    $request->Session()->put('profile_img',$data->profile_img);
                    Alert::success('Congrats', 'You\'ve Successfully Login');
                    return redirect('/doctor-dashboard');

                }
                else
                {
                    Alert::error('Fail', 'Login Failed due to Blocked Doctor');
                    return redirect('/doctor');
                }
            }
            else
            {
                Alert::error('Fail', 'Login Failed due to Wrong Password');
                return redirect('/doctor');
            }

        }
        else
       {
        Alert::error('Fail', 'Login Failed due to Wrong doctor');
        return redirect('/doctor');
       }
    }

    public function doctorlogout()
    {
        Session()->pull('doctor_id');
        Session()->pull('email');
        Session()->pull('profile_img');
        Session()->pull('drname');
        return redirect('/doctor');
    }

    public function editdoctor()
    {
        $data=doctor::where("id","=",session('doctor_id'))->first();
        $special_id_arr=specialist::all();
        $state_id_arr=state::all();
        $city_id_arr=citie::all();
        $area_id_arr=area::all();
        return view('doctor.doctor-profile-settings',["fetch"=>$data,"special_id_arr"=>$special_id_arr,"state_id_arr"=>$state_id_arr,"city_id_arr"=>$city_id_arr,"area_id_arr"=>$area_id_arr]);
    }

    public function updatedoctor(Request $request, $doctor_id)
    {   
       $data=$request->validate([
            'first_name'=>'alpha',
            'last_name'=>'alpha',
            //'short_tittle'=>'required',//check
            //'email'=>'required|email|unique:doctors',
            //'gender'=>'required|in:male,female',//check
            //'password'=>'required|string|unique:doctors|min:6',
            'dob'=>'date',
            //'liacence_no'=>'required',//check
            'education'=>'regex:/[a-zA-z0-9\s]+/',
            'experience'=>'regex:/[a-zA-z0-9\s]+/',
            'hospital_name'=>'regex:/[a-zA-z0-9\s]+/',
            'dr_mobile'=>'digits:10',
            'office_no'=>'alpha_num|string',
            //'about'=>'required',
            'address'=>'max:200',
            'pincode'=>'digits:6',
            //'day'=>'required',
            'consulting_fees'=>'numeric',
            'followup_fees'=>'numeric',
            'notification'=>'max:200',
            //'specialist_id'=>'required',
            //'state'=>'required',
            //'city'=>'required',
            //'area'=>'required',
            'profile_img'=>'mimes:jpeg,png,jpg,gif',
            //'hospital_img'=>'mimes:jpeg,png,jpg,gif',
            'visit_card'=>'mimes:jpeg,png,jpg,gif',

        ]);

        $data=doctor::where("id","=",session('doctor_id'))->first();
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->short_tittle=$request->short_tittle;
        $data->gender=$request->gender;
        $data->dob=$request->dob;
        $data->liacence_no=$request->liacence_no;
        $data->education=$request->education;
        $data->experience=$request->experience;
        $data->hospital_name=$request->hospital_name;
        $data->dr_mobile=$request->dr_mobile;
        $data->office_no=$request->office_no;
        $data->about=$request->about;
        $data->address=$request->address;
        $data->pincode=$request->pincode;
        $data->google_map=$request->google_map;
        $data->day=implode(",",$request->day);
        $data->hospital_morning_to=$request->hospital_morning_to;
        $data->hospital_morning_from=$request->hospital_morning_from;
        $data->hospital_afternoon_to=$request->hospital_afternoon_to;
        $data->hospital_afternoon_from=$request->hospital_afternoon_from;
        $data->hospital_evening_to=$request->hospital_evening_to;
        $data->hospital_evening_from=$request->hospital_evening_from;
        $data->consulting_fees=$request->consulting_fees;
        $data->followup_fees=$request->followup_fees;
        $data->notification=$request->notification;
       // $old_img=$data->profile_img;
        $old_img2=$data->hospital_img;
        $old_img3=$data->visit_card;

        $data->specialist_id=$request->specialist_id ;
        $data->state=$request->state;
        $data->city=$request->city;
        $data->area=$request->area;

        //img upload
        if($request->hasFile('profile_img'))
		{
			$file=$request->file('profile_img');  // get file
			$file_name=time() . "_profile_img." . $request->file('profile_img')->getClientOriginalExtension();// make file name
			$file->move('upload/doctor',$file_name); //file name move upload in public		
			$data->profile_img=$file_name; // file name store in db
			//unlink('upload/doctor/'.$old_img);
		}
         // hospital upload
         $filesarr = [];
        if($request->hasfile('hospital_img'))
        {
            foreach($request->file('hospital_img') as $file)
            {
                $name = time().rand(111111,999999).'hospital_img.'.$file->extension();
                $file->move('upload/hospital/',$name);
                $filesarr[] = $name;
                
            }
            $data->hospital_img=implode(",",$filesarr);
        }
         // visiting card upload
         if($request->hasFile('visit_card'))
         {
            $file3=$request->file('visit_card');  // get file
            $file_name3=time()."_visit_card_img.".$request->file('visit_card')->getClientOriginalExtension();// make file name
            $file3->move('upload/visitingcard',$file_name3); //file name move upload in public		
            $data->visit_card=$file_name3; // file name store in db
            unlink('upload/visitingcard/'.$old_img3);
         }

        $data->save();
        Alert::success('Done', 'You\'ve Successfully Update Your Profile');
		return redirect('/editdoctor');
    }

    public function visitor_timings()//visitor slots show
    {
        $data=visitor_slots::where('doc_id','=',Session('doctor_id'))->get();
        return view('doctor.visitor_timings',["slots_arr"=>$data]);
    }

    public function visitor_slots(Request $request)//visitor slots page
    {
        return view('/doctor.visitor_slots');
    }
    
    public function add_visitor_slots1(Request $request)//visitor slots add1
    {
        $data=$request->validate([
            'start_time'=>'required',
            'end_time'=>'required',
            'mr_allowed'=>'required',
            'manager_allowed'=>'required',
            'company_allowed'=>'required',
            'day'=>'required',
        ]);

        $data=new visitor_slots;
        $data->start_time=$request->start_time;
        $data->visitor_slot=$request->visitor_slot;
        $data->end_time=$request->end_time;
        $data->mr_allowed=$request->mr_allowed;
        $data->manager_allowed=$request->manager_allowed;
        $data->company_allowed=$request->company_allowed;
        $data->day=$request->day;
        $data->doc_id=Session("doctor_id");
        $res=$data->save();
        Alert::success('Done', 'You\'ve Successfully Add Visitor Slot');
        return redirect('/doctor-visitor_slots');
    }

    public function add_visitor_slots2(Request $request)//visitor slots add2
    {
        $data=$request->validate([
            'start_time2'=>'required',
            'end_time2'=>'required',
            'mr_allowed2'=>'required',
            'manager_allowed2'=>'required',
            'company_allowed2'=>'required',
            'day2'=>'required',
        ]);

        $data=new visitor_slots;
        $data->start_time=$request->start_time2;
        $data->visitor_slot=$request->visitor_slot2;
        $data->end_time=$request->end_time2;
        $data->mr_allowed=$request->mr_allowed2;
        $data->manager_allowed=$request->manager_allowed2;
        $data->company_allowed=$request->company_allowed2;
        $data->day=$request->day2;
        $data->doc_id=Session("doctor_id");
        $res=$data->save();
        Alert::success('Done', 'You\'ve Successfully Add Vsitor Slot');
        return redirect('/doctor-visitor_slots');
    }

    public function editslots($id)
    {  
        $data=visitor_slots::find($id);
        return view('doctor.edit_visitor_slot',["fetch"=>$data]);
    }

    public function update_visitor_slots(Request $request,$id)//visitor slots update
    {
        $data=$request->validate([
            'start_time'=>'required',
            'end_time'=>'required',
            'mr_allowed'=>'required',
            'manager_allowed'=>'required',
            'company_allowed'=>'required',
            'day'=>'required',
        ]);

        $data=visitor_slots::find($id);
        $data->start_time=$request->start_time;
        $data->end_time=$request->end_time;
        $data->mr_allowed=$request->mr_allowed;
        $data->manager_allowed=$request->manager_allowed;
        $data->company_allowed=$request->company_allowed;
        $data->day=$request->day;
        $res=$data->update();
        Alert::success('Done', 'You\'ve Successfully Update Visitor Slot');
        return redirect('/doctor-visitor_timings');
    }

    public function delete_slots($id)
    {
        $data=visitor_slots::find($id);
		$data->delete();
        Alert::success('Done', 'You\'ve Successfully Delete Slot');
		return redirect('/doctor-visitor_timings');
    }
    
//////////////////////////Company panel////////////////////////////////////////////////////////////

public function companydoctorindex()
{
    $alldoctor_arr=doctor::join('specialists','specialists.id','=','doctors.specialist_id')->get();
    $favdoctor_arr=company_fav_doc::where('company_id','=',Session('company_id'))->get();
   
    return view('company.doctor-list',["alldoctor_arr"=>$alldoctor_arr,"favdoctor_arr"=>$favdoctor_arr]);
}




/*--public function visitor_slots(Request $request)//visitor slots add
    {
       $data=new visitor_slots;
        $data->start_time=$request->start_time;
        $data->end_time=$request->end_time;
        $data->mr_allowed=$request->mr_allowed;
        $data->manager_allowed=$request->manager_allowed;
        $data->company_allowed=$request->company_allowed;
        $data->day=$request->day;
        $data->doc_id=$request->doc_id;

        $res=$data->save();
        return redirect('/visitor_slots');
    }

    public function visitor_timings()//visitor slots show
    {
            return view('doctor.visitor_timings');
    }*/
//////////////////////////manager panel////////////////////////////////////////////////////////////

public function managerdoctorindex()
{
    $data=doctor::join('specialists','specialists.id','=','doctors.specialist_id')->get();
    return view('manager.doctor-list',["companydoctor_arr"=>$data]);
}

////////////////////////Patient Panel//////////////////////////////////////////////////////////
    public function doctorlist()
    {
        $data=doctor::join('specialists','specialists.id','=','doctors.specialist_id')->get();//->join('cities','cities.id','=','doctors.city')->join('states','states.id','=','doctors.state')->get();
		return view('patient.search',["doctorlist_arr"=>$data]);
    }

    public function doctorview($id)
    {
        $data=doctor::find($id);
        $doctor_id=$data->id;
        $servicelist_arr=service::where('doctor_id','=',$doctor_id)->get();
        $special_arr=drspecialitie::where('doctor_id','=',$doctor_id)->get();
        $fav_doctor=patient_fav::where('doctor_id','=',$doctor_id)->where('patient_id','=',Session('patient_id'))->first();
        return view('patient.doctor-profile',["fetch"=>$data,"servicelist_arr"=>$servicelist_arr,"special_arr"=>$special_arr,"fav_doctor"=>$fav_doctor]);
    }





} 