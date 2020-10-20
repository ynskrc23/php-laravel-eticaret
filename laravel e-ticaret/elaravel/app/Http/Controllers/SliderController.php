<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Slider;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
class SliderController extends Controller
{
    //
 	public function index(){
        $this->AdminAuthCheck();
		return view('admin.slider_add');
    }

     public function slider_all(){
        $this->AdminAuthCheck();
     	$slider_all=DB::table('tbl_slider')->get();
     	$manage_slider=view('admin.slider_all')
     	->with('slider_all',$slider_all);
     	return view('admin_layout')
     	->with('admin.slider_all',$manage_slider);

    	//return view('admin.slider_all');
    }

	 public function save_slider(Request $request)
	 {
    	if($request->hasfile('slider_image'))
        {
            $slider_image =Storage::putFile('public/upload/slider/',$request->slider_image);
        }

        $slider_add = new slider();
		$slider_add->publication_status = $request->publication_status;
        $slider_add->slider_image = $slider_image;
        $slider_add->save();
        return redirect('slider-all')->with('slider_add',$slider_add);
    	}

		public function edit_slider($slider_id)
	{
        $slider_edit = Slider::find($slider_id);
    	return view('admin.slider_edit')->with('slider_edit',$slider_edit);
    }

	public function update_slider(Request $request,$slider_edit)
	{

        $slider_edit = Slider::find($slider_edit);
        if($request->hasfile('slider_image'))
        {
			Storage::delete($slider_edit->slider_image);
            $slider_image =Storage::putFile('public/upload/slider/',$request->slider_image);
        }
             
		$slider_edit->publication_status = $request->publication_status;
        $slider_edit->slider_image = $slider_image;      
        $slider_edit->save();
        return redirect('slider-all')->with('slider_edit',$slider_edit);

	}


    public function delete_slider($slider_id){

		$delete = Slider::find($slider_id);
		if($delete->slider_image){
		Storage::delete($delete->slider_image);
		}     
		$delete->delete();
		return redirect('slider-all')->with('delete',$delete);
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
