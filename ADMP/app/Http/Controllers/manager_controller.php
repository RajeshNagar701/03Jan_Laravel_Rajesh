<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companie;
use App\Models\manager;
use App\Models\division;
use Hash;
use Alert;
use Session;

class manager_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminmanagerindex()
    {
        $data=manager::all();

        return view('admin.manager',["comapany_arr"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminmanagercreate()
    {
        $company_id_arr=companie::all();
        return view('admin.add-manager',["company_id_arr"=>$company_id_arr]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adminmanagerstore(Request $request)
    {  
         $data=$request->validate([
        'company_id'=>'required',
        'Manager_name'=>'required|regex:/[a-zA-z0-9\s]+/',
        'first_name'=>'required|alpha',
        'last_name'=>'required|alpha',
        'email'=>'required|email|unique:managers',
        'password'=>'required|min:6|unique:managers',
        'mprofile_img'=>'required|mimes:jpeg,png,jpg,gif,svg',
        'visiting_card'=>'required|mimes:jpeg,png,jpg,gif,svg',
        
    ]);
        $data=new manager;

        $data->Manager_name=$request->Manager_name;
        $data->company_id=$request->company_id;
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->email=$request->email;
        $data->password=Hash::make($request->password);

        // img upload
		$file=$request->file('mprofile_img');  // get file
		$file_name=time()."_mprofile_img.".$request->file('mprofile_img')->getClientOriginalExtension();// make file name
		$file->move('upload/manager',$file_name); //file name move upload in public		
		$data->mprofile_img=$file_name; // file name store in db

        // visitingcard upload
		$file2=$request->file('visiting_card');  // get file
		$file_name2=time()."_visiting_card.".$request->file('visiting_card')->getClientOriginalExtension();// make file name
		$file2->move('upload/visitingcard',$file_name2); //file name move upload in public		
		$data->visiting_card=$file_name2; // file name store in db

        $res=$data->save();
        Alert::success('Done', 'You\'ve Successfully Add Manager');
        return redirect('admin-add-manager');
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
    public function adminmanageredit($id)
    {
        $data=manager::find($id);
        $company_id_arr=companie::all();
        return view('admin.edit-manager',["fetch"=>$data,"company_id_arr"=>$company_id_arr]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminmanagerupdate(Request $request, $id)
    {   
        
        $data=manager::find($id);

        $data->company_id=$request->company_id;
        $data->Manager_name=$request->Manager_name;
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->email=$request->email;
        $old_img=$data->mprofile_img;
        $old_img2=$data->visiting_card;

        //img upload
        if($request->hasFile('mprofile_img'))
		{
			$file=$request->file('mprofile_img');  // get file
			$file_name=time() . "_mprofile_img." . $request->file('mprofile_img')->getClientOriginalExtension();// make file name
			$file->move('upload/manager',$file_name); //file name move upload in public		
			$data->mprofile_img=$file_name; // file name store in db
			unlink('upload/manager/'.$old_img);
		}
         // visitingcard upload
         if($request->hasFile('visiting_card'))
		{
            $file2=$request->file('visiting_card');  // get file
            $file_name2=time()."_visiting_card.".$request->file('visiting_card')->getClientOriginalExtension();// make file name
            $file2->move('upload/visitingcard',$file_name2); //file name move upload in public		
            $data->visiting_card=$file_name2; // file name store in db
            unlink('upload/visitingcard/'.$old_img2);
        }

        $data->save();
        Alert::success('Done', 'You\'ve Successfully Update Manager');
		return redirect('/admin-manager');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminmanagerdestroy($id)
    {
        $data=manager::find($id);
        $data->delete();
        Alert::success('Done', 'You\'ve Successfully Delete Manager');
        return redirect('admin-manager');
    }

/////////////////////////////////////Company Panel/////////////////////////////////////////

public function companymanagercreate()
{
    $division_id_arr=division::where('company_id','=',Session('company_id'))->get();
    return view('company.add-manager',["division_id_arr"=>$division_id_arr]);
} 

public function companymanagerstore(Request $request)
{  
     $data=$request->validate([
    
    'Manager_name'=>'required|regex:/[a-zA-z0-9\s]+/',
    'division_id'=>'required',
    'first_name'=>'required|alpha',
    'last_name'=>'required|alpha',
    'email'=>'required|email|unique:managers',
    'password'=>'required|min:6|unique:managers',
    'mprofile_img'=>'required|mimes:jpeg,png,jpg,gif,svg',
    'visiting_card'=>'required|mimes:jpeg,png,jpg,gif,svg',
    
]);
    $data=new manager;

    $data->Manager_name=$request->Manager_name;
    $data->company_id=Session('company_id');
    $data->division_id=$request->division_id;
    $data->first_name=$request->first_name;
    $data->last_name=$request->last_name;
    $data->email=$request->email;
    $data->password=Hash::make($request->password);

    // img upload
    $file=$request->file('mprofile_img');  // get file
    $file_name=time()."_mprofile_img.".$request->file('mprofile_img')->getClientOriginalExtension();// make file name
    $file->move('upload/manager',$file_name); //file name move upload in public		
    $data->mprofile_img=$file_name; // file name store in db

    // visitingcard upload
    $file2=$request->file('visiting_card');  // get file
    $file_name2=time()."_visiting_card.".$request->file('visiting_card')->getClientOriginalExtension();// make file name
    $file2->move('upload/visitingcard',$file_name2); //file name move upload in public		
    $data->visiting_card=$file_name2; // file name store in db

    $res=$data->save();
    Alert::success('Done', 'You\'ve Successfully Add Manager');
    return redirect('company-add-manager');
}

public function companymanagerindex()
    {
        $data=manager::where('company_id','=',session('company_id'))->get();
        return view('company.manager',["comapany_arr"=>$data]);
    }

public function companymanageredit($id)
    {
        $data=manager::find($id);
        $division_id_arr=division::all();
        return view('company.edit-manager',["fetch"=>$data,"division_id_arr"=>$division_id_arr]);
    }

    public function companymanagerupdate(Request $request, $id)
    {   
        $data=manager::find($id);
        $data->division_id=$request->division_id;
        $data->Manager_name=$request->Manager_name;
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->email=$request->email;
        $old_img=$data->mprofile_img;
        $old_img2=$data->visiting_card;

        //img upload
        if($request->hasFile('mprofile_img'))
		{
			$file=$request->file('mprofile_img');  // get file
			$file_name=time() . "_mprofile_img." . $request->file('mprofile_img')->getClientOriginalExtension();// make file name
			$file->move('upload/manager',$file_name); //file name move upload in public		
			$data->mprofile_img=$file_name; // file name store in db
			unlink('upload/manager/'.$old_img);
		}
         // visitingcard upload
         if($request->hasFile('visiting_card'))
		{
            $file2=$request->file('visiting_card');  // get file
            $file_name2=time()."_visiting_card.".$request->file('visiting_card')->getClientOriginalExtension();// make file name
            $file2->move('upload/visitingcard',$file_name2); //file name move upload in public		
            $data->visiting_card=$file_name2; // file name store in db
            unlink('upload/visitingcard/'.$old_img2);
        }

        $data->save();
        Alert::success('Done', 'You\'ve Successfully Update Manager');
		return redirect('/company-manager');
    }

    public function companymanagerdestroy($id)
    {
        $data=manager::find($id);
        $data->delete();
        Alert::success('Done', 'You\'ve Successfully Delete Manager');
        return redirect('company-manager');
    }

    ////////////////////////////////////////////manager panel//////////////////////////////////
    public function login(Request $request)
    {
        return view('manager.login');
    }

    public function managerlogin(Request $request)
    {
        $data=$request->validate([
            
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);
        $data=manager::where("email","=","$request->email")->first();
        if($data)
        {
            if(Hash::check($request->password, $data->password))
            {
                $request->Session()->put('manager_id',$data->id);
                $request->Session()->put('email', $data->email);
                $mname=$data->first_name." ".$data->last_name; 
                $request->Session()->put('mname',$mname);
                $request->Session()->put('mprofile_img', $data->mprofile_img);
                Alert::success('Congrats', 'You\'ve Successfully Login');
                return redirect('manager-dashboard');
            }
            else
            {
                Alert::error('Fail', 'Login Failed due to Wrong Password');
                return redirect('/manager');
            }
        }
        else
        {
            Alert::error('Fail', 'Login Failed due to Wrong email');
            return redirect('/manager');
        }
    }

    public function managerlogout()
    {
        Session()->pull('manager_id');
        Session()->pull('email');
        Session()->pull('mprofile_img');
        Session()->pull('mname');
        return redirect('/manager');
    }

    public function managerprofile()
	{  
		$data=manager::where("id","=",session('manager_id'))->first();
		return view('manager.profile',["fetch"=>$data]);
	}

    public function editmanager($id)
    {
        $data=manager::where("id","=",session('manager_id'))->first();
        return view('manager.profile',["fetch"=>$data]);
    }

    public function managerupdate(Request $request, $id)
    {
        $data=manager::find($id);

        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->Manager_name=$request->Manager_name;
        $data->email=$request->email;
        $old_img=$data->mprofile_img;
        $old_img2=$data->visiting_card;

        // img upload
        if($request->hasFile('mprofile_img'))
		{
            $file=$request->file('mprofile_img');  // get file
            $file_name=time()."_mprofile_img.".$request->file('mprofile_img')->getClientOriginalExtension();// make file name
            $file->move('upload/manager',$file_name); //file name move upload in public		
            $data->mprofile_img=$file_name; // file name store in db
            unlink('upload/manager/'.$old_img);
        }

        // visitingcard upload
        if($request->hasFile('visiting_card'))
		{
            $file2=$request->file('visiting_card');  // get file
            $file_name2=time()."_visiting_card.".$request->file('visiting_card')->getClientOriginalExtension();// make file name
            $file2->move('upload/visitingcard',$file_name2); //file name move upload in public		
            $data->visiting_card=$file_name2; // file name store in db
            unlink('upload/visitingcard/'.$old_img2);
        }

        $data->save();
        Alert::success('Done', 'You\'ve Successfully Update Your Profile');
		return redirect('/manager-profile');
    }


}
