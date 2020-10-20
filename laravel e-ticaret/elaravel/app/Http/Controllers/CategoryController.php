<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryController extends Controller
{
    //
   
    public function index(){
        $this->AdminAuthCheck();
		return view('admin.category_add');
    }

    public function category_all(){
        $this->AdminAuthCheck();
     	$all_category=DB::table('tbl_category')->get();
     	$manage_category=view('admin.category_all')
     	->with('all_category',$all_category);
     	return view('admin_layout')
     	->with('admin.category_all',$manage_category);

    	//return view('admin.category_all');
    }


    public function save_category(Request $request){
    	
        $data=array();
    	$data['category_id']=$request->category_id;
    	$data['category_name']=$request->category_name;
    	$data['category_description']=$request->category_description;
    	$data['publication_status']=$request->publication_status;
    	$data['created_at']=$request->created_at;

    	DB::table('tbl_category')->insert($data);
		return Redirect::to('/category-all');
	}

	  public function edit_category($category_id){
        $this->AdminAuthCheck();
	  	$category_info =DB::table('tbl_category')
	  	->where('category_id',$category_id)
	  	->first();

	  	$category_info=view('admin.category_edit')
     	->with('category_info',$category_info);
     	return view('admin_layout')
     	->with('admin.category_edit',$category_info);


    	//return view('admin.category_edit');
    }

    public function update_category(Request $request,$category_id){
    	
    	$data=array();
    	$data['category_name']=$request->category_name;
    	$data['category_description']=$request->category_description;

    	DB::table('tbl_category')
    	->where('category_id',$category_id)
    	->update($data);
		return Redirect::to('/category-all');
	}

	public function delete_category($category_id){
        
    	DB::table('tbl_category')
    	->where('category_id',$category_id)
    	->delete();
		return Redirect::to('/category-all');
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
