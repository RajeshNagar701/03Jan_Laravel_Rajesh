<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

Use Faker\Factory as faker;

use App\Models\customer;
use Hash;
class customerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        //=>seeder
        
        $data=new customer;
		$data->name="rajesh nagar";
		$data->username="Rajesh";
		$data->pass=Hash::make("1234");
		$data->gen="Male";
		$data->lag="Hindi,Gujarati";
		
		// img upload
		//$file=$request->file('img');  // get file
		//$file_name=time() . "_img." . $request->file('img')->getClientOriginalExtension();// make file name
		//$file->move('upload/customer',$file_name); //file name move upload in public		
		$data->img="falana.jpg"; // file name store in db
		
		$data->cid="2";
		$data->save();
        */
        $faker=Faker::create();
        for($i=0;$i<=20;$i++)
        {
            $data=new customer;
            $data->name=$faker->name;
            $data->username=$faker->username;
            $data->pass=Hash::make($faker->password);
            $data->gen="Male";
            $data->lag="Hindi,Gujarati";
            $data->img=$faker->image;
            $data->cid="2";
            $data->save();
        }

    }
}
