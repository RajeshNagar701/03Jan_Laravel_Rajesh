<?php

namespace App\Http\Controllers;
use App\Mail\Sendmail;
use Illuminate\Http\Request;
use Mail;
use Exception;

class email_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }
	
	public function send(Request $request)
    {
		
	  
		/*	   
	   if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
	   {
			echo $emails;
	   } 
	   else 
	   {
		echo("$email is not a valid email address");
	   }
		*/
		/*
		
		try {
			
		} catch (Exception $e) {
			return redirect('/');
		}
		*/
       
	    $email=$request->email;
		
	   $otp=rand(111111,999999);
	   $request->session()->put('otp',$otp);

	   
	   $data=['otp'=>session('otp'),'body'=>"For booking confirm OTP fist "];
	   
	   Mail::to($email)->send(new Sendmail($data));
	   
	   return back()->with('Success', 'Mail send Success');
	  
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
