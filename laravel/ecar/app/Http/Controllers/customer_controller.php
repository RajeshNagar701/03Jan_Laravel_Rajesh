<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\welcomemail;
use App\Models\countrie;
use App\Models\customer;
use Mail;
use Hash;
use Session;


class customer_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$value=$request->search;
		if($value!="")
		{
			$customer_arr=customer::where('name','LIKE','%'.$value.'%')->get();
		}
		else
		{
			$customer_arr=customer::all();
		}
		//$customer_arr=customer::paginate(2);
		//$customer_arr = customer::join('countries', 'customers.cid', '=','countries.cid')
		//->get([]);
		return view('Backend.manage_user',["customer_arr"=>$customer_arr,"value"=>$value]);
        //return view('Backend.manage_user',compact('customer_arr','value'));
    }
	
	
	
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function login(Request $request)
    {
        return view('Frontend.login');
    } 

	
    public function create()
    {
		$county_arr=countrie::all();
        return view('Frontend.signup',["country_arr"=>$county_arr]);
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
			'name' => 'required|alpha',
			'username' => 'required|email|unique:customers',
			'pass' => 'required|min:3|max:12',
			'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
		]);
		
		
        $data=new customer;
	$name=$data->name=$request->name;
	$email=$data->username=$request->username;
		$data->pass=Hash::make($request->pass);
		$data->gen=$request->gen;
		$data->lag=implode(",",$request->lag);
		
		// img upload
		$file=$request->file('img');  // get file
		$file_name=time()."_img.".$request->file('img')->getClientOriginalExtension();// make file name
		$file->move('upload/customer',$file_name); //file name move upload in public		
		$data->img=$file_name; // file name store in db
		
		$data->cid=$request->cid;
		$res=$data->save();
		if($res)
		{
			$details=['title'=>$email,'comment'=>"Welcome Mail"];
	   
			Mail::to($email)->send(new welcomemail($details));
			return back()->with("success","Register Success");
		}
		else
		{
			alert("Not success");
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
		$county_arr=countrie::all();
        $data=customer::find($id);
		return view('Frontend.edit_user',["fetch"=>$data,"country_arr"=>$county_arr]);
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
        $data=customer::find($id);
		$old_img=$data->img;
		
		$data->name=$request->name;
		$data->username=$request->username;
		$data->gen=$request->gen;
		$data->lag=implode(",",$request->lag);
		$data->cid=$request->cid;
		// img upload
		if($request->hasFile('img'))
		{
			$file=$request->file('img');  // get file
			$file_name=time() . "_img." . $request->file('img')->getClientOriginalExtension();// make file name
			$file->move('upload/customer',$file_name); //file name move upload in public		
			$data->img=$file_name; // file name store in db
			unlink('upload/customer/'.$old_img);
		}
		$data->save();
		return redirect('/myaccount')->with('success','Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=customer::find($id);
		$old_img=$data->img;
		$data->delete();
		unlink('upload/customer/'.$old_img);
		return redirect('/manage_user')->with('success','Delete Success');
    }

	public function status($id)
    {
        $data=customer::find($id);
		$status=$data->status;
		if($status=="Block")
		{
			$data->status="Unblock";
			$data->save();
			return redirect('/manage_user')->with('success','Unblock Success');
		}
		else
		{
			$data->status="Block";
			$data->save();
			return redirect('/manage_user')->with('success','Block Success');
		}
		
    }


    public function userlogin(Request $request)
    {
		$data=$request->validate([
			'username' => 'required|alpha',
			'pass' => 'required|min:3|max:12'
		]);
		
		
        $data=customer::where("username","=",$request->username)->first();
		if($data)
        {
              if(Hash::check($request->pass, $data->pass))
              {
                    $status=$data->status;
                    if($status=="Unblock")
                    {
                        $request->Session()->put('cust_id',$data->id);
                        $request->Session()->put('username',$data->username);
                        return redirect('/index');
						
                    }
                    else
                    {
                        return redirect('/login')->with('fail','Login Failed due to Blocked User');
                    }

              }  
              else
              {
                return redirect('/login')->with('fail','Login Failed due to Wrong password');
              }
        }
        else
        {
            return redirect('/login')->with('fail','Login Failed due to Wrong user Name');
        }
    }
	
	public function myaccount()
	{
		$data=customer::where("id","=",session('cust_id'))->first();
		return view('Frontend.myaccount',["fetch"=>$data]);
	}
	public function logout()
	{
		Session()->pull('cust_id');
		Session()->pull('username');
		return redirect('/index');
		
	}


}
