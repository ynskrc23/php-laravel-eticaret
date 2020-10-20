<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    //
    public function login_check(){
    	return view('pages.login');
    }


    public function customer_save(Request $request){
    	
        $data=array();
    	$data['customer_name']=$request->customer_name;
    	$data['customer_email']=$request->customer_email;
    	$data['customer_password']=$request->customer_password;
    	$data['customer_mobile']=$request->customer_mobile;

    	$customer_id=DB::table('tbl_customer')->insertGetId($data);

    		Session::put('customer_id',$customer_id);
    		Session::put('customer_name',$request->customer_name);
			return Redirect('/checkout');
	}


	public function checkout(){
		return view('pages.checkout');
	}


	public function shopping_save(Request $request){
    	
        $data=array();
        $data['shopping_email']=$request->shopping_email;
    	$data['shopping_first_name']=$request->shopping_first_name;
    	$data['shopping_last_name']=$request->shopping_last_name;
    	$data['shopping_adres']=$request->shopping_adres;
    	$data['shopping_mobile_number']=$request->shopping_mobile_number;
    	$data['shopping_ctiy']=$request->shopping_ctiy;

    	$shopping_id=DB::table('tbl_shopping')->insertGetId($data);
    		Session::put('shopping_id',$shopping_id);
			return Redirect('/payment');
	}

	public function customer_login(Request $request){
    	
        $customer_email=$request->customer_email;
    	$customer_password=$request->customer_password;
    	$result=DB::table('tbl_customer')
    		->where('customer_email',$customer_email)
    		->where('customer_password',$customer_password)
    		->first();
    		
    	
    		if($result){
    			Session::put('customer_name',$result->customer_name);
    			Session::put('customer_id',$result->customer_id);
    			return Redirect::to('/checkout');
    		}else
    		{
    			Session::put('messege','Email and Password Hatali');
    			return Redirect::to('/login-check');
    		}
	}


	public function payment (){

		/*
        $all_published_category =DB::table('tbl_category')
			->where('publication_status',1)
			->get();

		$manage_published_category =view('pages.payment')
			->with('all_published_category',$all_published_category);
			return view('layout')
			->with('pages.payment',$manage_published_category);		
        */

		return view('pages.payment');
    }

    public function payment_save(Request $request){

        $contents=Cart::content();
        $pdata=array();
        foreach($contents as $ct) {
            $pdata['payment_details_product_id']=$ct->id;
            $pdata['payment_details_product_name']=$ct->name;
            $pdata['payment_details_product_quantity']=$ct->qty;
            $pdata['payment_details_product_price']=$ct->price;    
            $payment_details_id =DB::table('tbl_payment_details')
                                ->insertGetId($pdata);              
        }    


        $data=array();
        $data['payment_customer_id']=Session::get('customer_id');
        $data['payment_shopping_id']=Session::get('shopping_id');
        $data['payment_details_id']=$payment_details_id;
        $data['payment_method']='paypal';
        $data['payment_total']=Cart::total();
        
        $payment_id =DB::table('tbl_payment')
                    ->insertGetId($data);
            Session::put('payment_id',$payment_id);
            Cart::destroy();
            return Redirect('/'); 
   
    }


	public function customer_logout (){

			Session::flush();
    		return Redirect::to('/');
    }


}
