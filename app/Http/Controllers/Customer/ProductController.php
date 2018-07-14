<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use App\Model\User;
use App\Model\Products;
use Socialite;
use DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Contracts\Auth\Authenticatable;

class ProductController extends Controller
{
    //
	
	/**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
	
	public function showProductList($id){
		
		$homeTitle = 'showProductList';
		
		if(!empty($id)){
			$products = Products::where('product_id', $id)->first();
			//dd($products);
		}
		
		
		 return view('customer.show-product',array('homeTitle'=>$homeTitle,'products'=>$products));
		
       
	}
	
	
	
	public function showFeaturedProductList($id){
		
		$homeTitle = 'showFeaturedProductList';
		
		if(!empty($id)){
			$products = Products::where('product_id', $id)->first();
			//dd($products);
		}
		
		
		 return view('customer.show-featured-product',array('homeTitle'=>$homeTitle,'products'=>$products));
		
       
	}
	
	
	public function productList(Request $request){
		
		
		$homeTitle = 'productList';
		
		$products=  Products::all();
		
		$feature = array();
		foreach($products as $pr){
			
			if($pr->is_featured==1){
				$feature[] = $pr;
				//echo "<pre>"; print_r($feature); die;
			} elseif($pr->is_promotion==1){
				$promotin[] = $pr;
				//echo "<pre>"; print_r($promotin); die;
			} 
		} 
		
		
		
		 return view('homepage',array('homeTitle'=>$homeTitle,'feature'=>$feature,'promotin'=>$promotin));
		
       
	}
	
	
		

}