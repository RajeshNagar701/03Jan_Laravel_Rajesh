<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\contact_controller;
use App\Http\Controllers\about_controller;
use App\Http\Controllers\advcar_controller;
use App\Http\Controllers\customer_controller;
use App\Http\Controllers\index_controller;
use App\Http\Controllers\services_controller;
use App\Http\Controllers\dashboard_controller;
use App\Http\Controllers\admin_controller;
use App\Http\Controllers\booking_controller;
use App\Http\Controllers\client_controller;
use App\Http\Controllers\employee_controller;
use App\Http\Controllers\cat_controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function() {
	Return view('welcome');
})

Route::get('/myfunction/{name}', function($name) {
	echo "Hi hello";
	echo "<h1>" . $name . "</h1>";
	Return view('myfunction',["name"=>$name]);
});

*/

//Route::view('/','Frontend.index');


//Controller

//Route::get('/contact',[contact_controller::class,'index']); // Simple

//Route::get('/contact',contact_controller::class); // single /invokable function



Route::get('/contact',[contact_controller::class,'create']); // view 
Route::post('/contact',[contact_controller::class,'store']); // insert
Route::get('/contact/{id}',[contact_controller::class,'destroy']); // Delete
 
Route::get('/',[index_controller::class,'index']); 
Route::get('/index',[index_controller::class,'index']);
Route::get('/about',[about_controller::class,'index']);
Route::get('/adv_car',[advcar_controller::class,'index']);
Route::get('/services',[services_controller::class,'index']);

Route::get('/login',[customer_controller::class,'login'])->middleware('beforelogin');
Route::post('/userlogin',[customer_controller::class,'userlogin']);
Route::get('/logout',[customer_controller::class,'logout']);

Route::get('/signup',[customer_controller::class,'create'])->middleware('beforelogin');
Route::post('/signup',[customer_controller::class,'store']);

Route::get('/myaccount',[customer_controller::class,'myaccount'])->middleware('afterlogin');
Route::get('/edit/{id}',[customer_controller::class,'edit'])->middleware('afterlogin');
Route::post('/edit/{id}',[customer_controller::class,'update']);
Route::get('/delete/{id}',[customer_controller::class,'destroy']);
Route::get('/status/{id}',[customer_controller::class,'status']);

//===================================================

Route::get('/admin',[admin_controller::class,'login']);
Route::post('/adminlogin',[admin_controller::class,'adminlogin']);

Route::group(['middleware'=>['adminAuth']], function(){
	
	Route::get('/dashboard',[dashboard_controller::class,'index']);
	Route::get('/manage_user',[customer_controller::class,'index']);
	Route::post('/manage_user',[customer_controller::class,'index']);
	Route::get('/add_emp',[employee_controller::class,'store']);
	Route::get('/manage_emp',[employee_controller::class,'index']);
	Route::get('/add_cat',[cat_controller::class,'store']);
	Route::get('/manage_cat',[cat_controller::class,'index']);
	Route::get('/manage_client',[client_controller::class,'index']);
	Route::get('/manage_car',[advcar_controller::class,'manage_car']);
	Route::get('/manage_booking',[booking_controller::class,'index']);
	Route::get('/manage_contact',[contact_controller::class,'index']);
});
?>

