<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Hash;
use Session;

class admin_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
	
	public function login(Request $request)
    {
        return view('Backend.index');
    }
	
	
	 public function adminlogin(Request $request)
    {
		$data=$request->validate([
			'username' => 'required|alpha',
			'password' => 'required|min:3|max:12'
		]);
		
        $data=admin::where("username","=",$request->username)->first();
		if($data)
        {
              if(Hash::check($request->password, $data->password))
              {
					$request->Session()->put('admin_id',$data->id);
					$request->Session()->put('adminname',$data->username);
					return redirect('/dashboard');
              }  
              else
              {
                return redirect('/admin')->with('fail','Login Failed due to Wrong password');
              }
        }
        else
        {
            return redirect('/admin')->with('fail','Login Failed due to Wrong user Name');
        }
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
