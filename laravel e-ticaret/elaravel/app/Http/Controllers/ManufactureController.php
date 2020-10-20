<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class ManufactureController extends Controller
{
	public function index(){
        $this->AdminAuthCheck();
		return view('admin.manufacture_add');
    }

    public function manufacture_all(){
        $this->AdminAuthCheck();
     	$all_manufacture=DB::table('tbl_manufacture')->get();
     	$manage_manufacture=view('admin.manufacture_all')
     	->with('all_manufacture',$all_manufacture);
     	return view('admin_layout')
     	->with('admin.manufacture_all',$manage_manufacture);

    	//return view('admin.manufacture_all');
    }

    public function save_manufacture(Request $request){
    	
        $data=array();
    	$data['manufacture_id']=$request->manufacture_id;
    	$data['manufacture_name']=$request->manufacture_name;
    	$data['manufacture_description']=$request->manufacture_description;
    	$data['publication_status']=$request->publication_status;

    	DB::table('tbl_manufacture')->insert($data);
		return Redirect::to('/manufacture-all');
	}

	 public function edit_manufacture($manufacture_id){
        $this->AdminAuthCheck();
	  	$manufacture_info =DB::table('tbl_manufacture')
	  	->where('manufacture_id',$manufacture_id)
	  	->first();

	  	$manufacture_info=view('admin.manufacture_edit')
     	->with('manufacture_info',$manufacture_info);
     	return view('admin_layout')
     	->with('admin.manufacture_edit',$manufacture_info);


    	//return view('admin.manufacture_edit');
    }

    public function update_manufacture(Request $request,$manufacture_id){
    	
    	$data=array();
    	$data['manufacture_name']=$request->manufacture_name;
    	$data['manufacture_description']=$request->manufacture_description;

    	DB::table('tbl_manufacture')
    	->where('manufacture_id',$manufacture_id)
    	->update($data);
		return Redirect::to('/manufacture-all');
	}

	public function delete_manufacture($manufacture_id){
 
    	DB::table('tbl_manufacture')
    	->where('manufacture_id',$manufacture_id)
    	->delete();
		return Redirect::to('/manufacture-all');
	}

     public function AdminAuthCheck(){

            $admin_id =Session::get('admin_id');
            if($admin_id){
                return;
            }else{
                return Redirect::to('/admin')->send();
            }
        }

}
