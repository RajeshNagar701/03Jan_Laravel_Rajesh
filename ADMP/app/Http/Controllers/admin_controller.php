<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Hash;
use Session;
use Alert;
use Exception;

class admin_controller extends Controller
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
        //
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

    public function myaccount()
	{
		$data=admin::where("id","=",session('admin_id'))->first();
		return view('admin.profile',["fetch"=>$data]);
	}


    public function editadmin()
    {
        $data=admin::where("id","=",session('admin_id'))->first();
        return view('admin.profile',["fetch"=>$data]);
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
        $data=admin::find($id);
        $old_img=$data->img;
        $data->name=$request->name;
       

        // img upload
		if($request->hasFile('img'))
		{
			$file=$request->file('img');  // get file
			$file_name=time() . "_img." . $request->file('img')->getClientOriginalExtension();// make file name
			$file->move('upload/admin',$file_name); //file name move upload in public		
			$data->img=$file_name; // file name store in db
            //unlink('upload/admin/'.$old_img);
			
		}

        $data->save();
        Alert::success('Congrats', 'You\'ve Successfully Update You\'re Profile');
		return redirect('/admin-profile');
    }
    
    public function login(Request $request)
    {
        return view('Admin.login');
    }
//
    public function profile()
	{  
		$data=admin::where("id","=",session('admin_id'))->first();
		return view('admin.profile',["fetch"=>$data]);
	}

    public function adminlogin(Request $request)
    {
        $data=$request->validate([
            
            'email'=>'required|email',
            'password'=>'required',
        ]);
       $data=admin::where("email","=",$request->email)->first();
       if($data)
       {
           if(Hash::check($request->password, $data->password))
           {
                    $request->Session()->put('admin_id',$data->id);
                    $request->Session()->put('email',$data->email);
                    $request->Session()->put('name',$data->name);
                    $request->Session()->put('img',$data->img);
                    Alert::success('Congrats', 'You\'ve Successfully Login');
                   return redirect('/admin');
               
           }
           else
           {
            Alert::error('Fail', 'Login Failed due to Wrong email');
            return redirect('/admin-login');//->with('fail','Login Failed due to Wrong Password');
           }
       }
       else
       {
        Alert::error('Fail', 'Login Failed due to Wrong email');
        return redirect('/admin-login');//->with('fail','Login Failed due to Wrong email');
       }
    }

    public function logout()
    {
        Session()->pull('admin_id');
        Session()->pull('email');
        Session()->pull('name');
        Session()->pull('img');
        return redirect('/admin-login');
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
