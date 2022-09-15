<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\specialist;
use Alert;
use Exception;

class specialist_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=specialist::all();
		return view('admin.specialities',["specialities_arr"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-specialities');
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
            'name'=>'required|regex:/[a-zA-z0-9\s]+/',
            'img'=>'required|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $data=new specialist;
        $data->name=$request->name;

         // img upload
		$file=$request->file('img');  // get file
		$file_name=time()."_img.".$request->file('img')->getClientOriginalExtension();// make file name
		$file->move('upload/specialities',$file_name); //file name move upload in public		
		$data->img=$file_name; // file name store in db

        $res=$data->save();
        Alert::success('Done', 'You\'ve Successfully Add Specialist');
        return redirect('admin-add-specialities');
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
        $data=specialist::find($id);
        return view('admin.edit-specialist',["fetch"=>$data]);
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
        $data=specialist::find($id);
        $data->name=$request->name;
        $old_img=$data->img;

        //img upload
        if($request->hasFile('img'))
		{
			$file=$request->file('img');  // get file
			$file_name=time() . "_img." . $request->file('img')->getClientOriginalExtension();// make file name
			$file->move('upload/specialities',$file_name); //file name move upload in public		
			$data->img=$file_name; // file name store in db
			unlink('upload/specialities/'.$old_img);
		}

        $data->save();
        Alert::success('Done', 'You\'ve Successfully Update Specialist');
		return redirect('/admin-specialities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=specialist::find($id);
		$data->delete();
        Alert::success('Done', 'You\'ve Successfully Delete Specialist');
		return redirect('admin-specialities');
    }
}
