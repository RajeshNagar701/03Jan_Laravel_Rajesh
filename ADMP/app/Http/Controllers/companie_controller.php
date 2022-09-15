<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companie;
use Hash;
use Session;
use Alert;
use Exception;

class companie_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admincompanyindex()
    {
        $data=companie::all();
        return view('admin.company',["companie_arr"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admincompanycreate()
    {
        return view('admin.add-company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admincompanystore(Request $request)
    {   
        $data=$request->validate([
            'first_name'=>'required|alpha',
            'last_name'=>'required|alpha',
            'company_name'=>'required|unique:companies|regex:/[a-zA-z0-9\s]+/',
            'email'=>'required|email|unique:companies',
            'password'=>'required|min:6',
            'cprofile_img'=>'required|mimes:jpeg,png,jpg,gif,svg',
            'visiting_card'=>'required|mimes:jpeg,png,jpg,gif,svg',

        ]);
        $data=new companie;
        
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->company_name=$request->company_name;
        $data->email=$request->email;
        $data->password=Hash::make($request->password);

        // img upload
		$file=$request->file('cprofile_img');  // get file
		$file_name=time()."_cprofile_img.".$request->file('cprofile_img')->getClientOriginalExtension();// make file name
		$file->move('upload/companyprofile',$file_name); //file name move upload in public		
		$data->cprofile_img=$file_name; // file name store in db

        // visitingcard upload
		$file2=$request->file('visiting_card');  // get file
		$file_name2=time()."_visiting_card.".$request->file('visiting_card')->getClientOriginalExtension();// make file name
		$file2->move('upload/visitingcard',$file_name2); //file name move upload in public		
		$data->visiting_card=$file_name2; // file name store in db

        $res=$data->save();
        Alert::success('Done', 'You\'ve Successfully Add Company');
        return redirect('admin-add-company');

    }

    //------login------
    
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
    public function admincompanyedit($id)
    {
        $data=companie::find($id);
        return view('admin.edit-company',["fetch"=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admincompanyupdate(Request $request, $id)
    {
        $data=companie::find($id);

        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->company_name=$request->company_name;
        $data->email=$request->email;
        $old_img=$data->cprofile_img;
        $old_img2=$data->visiting_card;

        // img upload
        if($request->hasFile('cprofile_img'))
		{
            $file=$request->file('cprofile_img');  // get file
            $file_name=time()."_cprofile_img.".$request->file('cprofile_img')->getClientOriginalExtension();// make file name
            $file->move('upload/companyprofile',$file_name); //file name move upload in public		
            $data->cprofile_img=$file_name; // file name store in db
            unlink('upload/companyprofile/'.$old_img);
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
        Alert::success('Done', 'You\'ve Successfully Update Company');
		return redirect('/admin-company')->with('success','Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admincompanydestroy($id)
    {
        $data=companie::find($id);
        $data->delete();
        Alert::success('Done', 'You\'ve Successfully Delete Company');
        return redirect('admin-company');
    }

    ///=====================company panel================================================================
    public function login(Request $request)
    {
        return view('company.login');
    }

    public function companylogin(Request $request)
    {
        $data=$request->validate([
            
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);
        $data=companie::where("email","=","$request->email")->first();
        if($data)
        {
            if(Hash::check($request->password, $data->password))
            {
                $request->Session()->put('company_id',$data->id);
                $request->Session()->put('email', $data->email);
                $cname=$data->first_name." ".$data->last_name; 
                $request->Session()->put('cname',$cname);
                $request->Session()->put('cprofile_img', $data->cprofile_img);
                Alert::success('Congrats', 'You\'ve Successfully Login');
                return redirect('company-dashboard');
            }
            else
            {
                Alert::error('Fail', 'Login Failed due to Wrong Password');
                return redirect('/company');
            }
        }
        else
        {
            Alert::error('Fail', 'Login Failed due to Wrong email');
            return redirect('/company');
        }
    }

    public function companylogout()
    {
        Session()->pull('company_id');
        Session()->pull('email');
        Session()->pull('cprofile_img');
        Session()->pull('cname');
        return redirect('/company');
    }

    public function companyprofile()
	{  
		$data=companie::where("id","=",session('company_id'))->first();
		return view('company.profile',["fetch"=>$data]);
	}

    public function editcompany($id)
    {
        $data=companie::where("id","=",session('company_id'))->first();
        return view('company.profile',["fetch"=>$data]);
    }

    public function companyupdate(Request $request, $id)
    {
        $data=companie::find($id);

        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->company_name=$request->company_name;
        $data->email=$request->email;
        $old_img=$data->cprofile_img;
        $old_img2=$data->visiting_card;

        // img upload
        if($request->hasFile('cprofile_img'))
		{
            $file=$request->file('cprofile_img');  // get file
            $file_name=time()."_cprofile_img.".$request->file('cprofile_img')->getClientOriginalExtension();// make file name
            $file->move('upload/companyprofile',$file_name); //file name move upload in public		
            $data->cprofile_img=$file_name; // file name store in db
            unlink('upload/companyprofile/'.$old_img);
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
        Alert::success('Done', 'You\'ve Successfully Update Company Profile');
		return redirect('/company-profile');
    }

}

    


    

