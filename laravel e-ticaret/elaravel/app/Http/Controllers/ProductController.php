<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;


session_start();
class ProductController extends Controller
{
   	public function index(){
        $this->AdminAuthCheck();
		return view('admin.product_add');
    }

    public function product_all(){
        $this->AdminAuthCheck();
     	$all_product=DB::table('tbl_products')
     	->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
     	->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
     	->get();
 
     	$manage_product=view('admin.product_all')
     	->with('all_product',$all_product);
     	return view('admin_layout')
     	->with('admin.product_all',$manage_product);		
		//return view('admin.product_all');

    }

    public function add_product(Request $request){
		if($request->hasfile('product_image'))
        {
            $product_image =Storage::putFile('public/upload/product/',$request->product_image);
        }

        $product_add = new product();
        $product_add->product_name = $request->product_name;
        $product_add->category_id = $request->category_id;
		$product_add->manufacture_id = $request->manufacture_id;

		$product_add->product_short_description = $request->product_short_description;
        $product_add->product_long_description = $request->product_long_description;
		$product_add->product_price = $request->product_price;

		$product_add->product_size = $request->product_size;
        $product_add->product_color = $request->product_color;
		$product_add->publication_status = $request->publication_status;


        $product_add->product_image = $product_image;
        $product_add->save();
        return redirect('product-all')->with('product_add',$product_add);

	}
	

	public function edit_product($product_id)
	{
        $product_edit = Product::find($product_id);
    	return view('admin.product_edit')->with('product_edit',$product_edit);
    }

	public function update_product(Request $request,$product_edit)
	{

        $product_edit = Product::find($product_edit);
        if($request->hasfile('product_image'))
        {
			Storage::delete($product_edit->product_image);
            $product_image =Storage::putFile('public/upload/product/',$request->product_image);
        }
        
        $product_edit->product_name = $request->product_name;
        $product_edit->category_id = $request->category_id;
		$product_edit->manufacture_id = $request->manufacture_id;
		$product_edit->product_short_description = $request->product_short_description;
        $product_edit->product_long_description = $request->product_long_description;
		$product_edit->product_price = $request->product_price;
		$product_edit->product_size = $request->product_size;
        $product_edit->product_color = $request->product_color;
		$product_edit->publication_status = $request->publication_status;

        $product_edit->product_image = $product_image;      
        $product_edit->save();
        return redirect('product-all')->with('product_edit',$product_edit);

	}

	public function delete_product($product_id){

		$delete = Product::find($product_id);
		if($delete->product_image){
		Storage::delete($delete->product_image);
		}     
		$delete->delete();
		return redirect('product-all')->with('delete',$delete);
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
