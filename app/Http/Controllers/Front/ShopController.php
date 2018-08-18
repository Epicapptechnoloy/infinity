<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Model\Review;
use App\Model\ProductCart;
use App\Model\Products;
use App\Model\Orders;
use App\Model\OrderDetails;
use DB;
use Session;
use Auth;
use App\Repositories\Front\MarketRepository as MarketRepository;


class ShopController extends Controller
{
	private $marketRepository;
	
	public function __construct(){
        $this->marketRepository = new MarketRepository();
    }	
	
	private function ajaxResponse($success, $message, $exception = null, $code = 200) {
        return response()->json(array(
                    'success' => $success,
                    'message' => $message,
                    'exception' => $exception,
                    'status' => $code
        ));
    }
	
	public function shop(){
		$data = array();
		$data['homeTitle'] = 'Infinity.com';
		$data['sidetype'] = 1;
		$data['formtype'] = 0;
		
		$data['Categories'] = $this->marketRepository->getAllCategories();
		$data['productColors'] = $this->marketRepository->getAllProductColors();
		$data['productSizes'] = $this->marketRepository->getAllProductSizes();
		$maxPrice = $this->marketRepository->getProductMaxPrice();
		$data['maxPrice'] = (int) $maxPrice->maxprice;
		$data['minPrice'] = 1;
		
        return view('front/shop/shop', $data);
    }
	
	
	public function getproducts(Request $request){
	
		$data = array();	
	
		$data['products'] = $this->marketRepository->getAllProducts($request);
		$data['request'] = $request;
	
		return view('front/shop/product-list', $data);
	}
	
	
	public function productDetail(Request $request){
		
		$productId = base64_decode($request->productId);
		$productId = (int) $productId;
		if($productId <= 0){
			return redirect()->route('shop');
		}
		$data = array();
		$data['homeTitle'] = 'infinity.com'; 
		$data['sidetype'] = 1;
		$data['Categories'] = $this->marketRepository->getAllCategories();
		$data['productColors'] = $this->marketRepository->getAllProductColors();
		$data['productSizes'] = $this->marketRepository->getAllProductSizes();
		$maxPrice = $this->marketRepository->getProductMaxPrice();
		$data['maxPrice'] = (int) $maxPrice->maxprice;
		$data['minPrice'] = 1;
		$data['product'] = $this->marketRepository->getProductById($productId);
		$data['reviews'] = Review::where('product_id',$productId)->get();
	
        return view('front/shop/product-detail', $data);
    }
	
	public function checkout(Request $request){
			
		$data = array();
		$data['homeTitle'] = 'infinity.com'; 
		$data['sidetype'] = 2;
		$userId = Auth::guard('frontUser')->user()->id;
		//$userBalance = Auth::guard('frontUser')->user()->UserAccount->balance_amt;
		//$data['userBalance'] = $userBalance;
		$data['Categories'] = $this->marketRepository->getAllCategories();
		$data['billingAddrs'] = $this->marketRepository->getBillingAdress($userId);
		$data['product'] = ProductCart::where('user_id',\Auth::guard('frontUser')->user()->id)->where('user_session_id',\Session::getId())->groupBy('user_session_id')->sum('total_price');
		
		$countries = \App\Model\Countries::select('country_id', 'country_code', 'country_name')->where('status', 1)->orderBy('country_name', 'DESC');
		$data['countries'] = $countries->get();
		
		
		return view('front/shop/product-checkout', $data);
	}
	
	public function INFKart(Request $request){
		
		$data = array();		
		$data['homeTitle'] = 'infinity.com';
		$data['Categories'] = $this->marketRepository->getAllCategories();
		$data['products'] = ProductCart::where('user_id',\Auth::guard('frontUser')->user()->id)->get();
		
        return view('front/shop/my-cart', $data);
    }
	
	public function updateINFKart(Request $request){
		
		if($request->isMethod('post') && $request->ajax()) {
			
			/***************When user try to update item from Kart ********************/
			if($request->action == 'update'){
				if($request->qty && $request->pid){
					
					try{
					\DB::beginTransaction();
					$product = Products::where('product_id',$request->pid)->first();
					$data['qty'] 				= $request->qty;
					$data['total_price'] 	  	= (int)($product->price * $request->qty) + 0;	
					
					ProductCart::where('user_id',\Auth::guard('frontUser')->user()->id)->where('product_id',$request->pid)->update($data);				
						$returnArr = array(
							'error'     =>  0,
							'message'   =>  'Kart updated successfully.',					
							'status'    =>  200
						);				
					\DB::commit();				
				}catch(\Illuminate\Database\QueryException $e){
					\DB::rollBack();
					$returnArr = array(
						'error'     =>  1,
						'message'   =>  $e->getMessage(),					
						'status'    =>  200
					);
				}
				}else{
					$returnArr = array(
							'error'     =>  1,
							'message'   =>  'parameter missing.',					
							'status'    =>  200
						);
				
				}
			}

		/***************When user try to remove item from Kart ********************/
		if($request->action == 'delete'){
			//dd($request->id);
			if($request->id){
				try{
				\DB::beginTransaction();
				$product = ProductCart::where('cart_id',$request->id)->delete();
							
					$returnArr = array(
						'error'     =>  0,
						'message'   =>  'Removed successfully.',					
						'status'    =>  200
					);				
				\DB::commit();				
			}catch(\Illuminate\Database\QueryException $e){
				\DB::rollBack();
				$returnArr = array(
					'error'     =>  1,
					'message'   =>  $e->getMessage(),					
					'status'    =>  200
				);
			}
			}else{
				$returnArr = array(
						'error'     =>  1,
						'message'   =>  'parameter missing.',					
						'status'    =>  200
					);
			
			}
		}
		
		}else{
			$returnArr = array(
						'error'     =>  1,
						'message'   =>  'Not accessible.',					
						'status'    =>  200
					);
		}
		echo json_encode($returnArr);die;
	}
	
	
	
	public function checkLogin(Request $request)
	{	
		
		if(empty(\Auth::guard('frontUser')->user()))
		{
			
			return $this->setCartInSession($request);
			
		}
		else
		{
			
			return $this->setProductInCart($request);
		}
	}
	
	private function setProductInCart($request)
	{
		
		try{
			$productId = (int) $request->productId;
			$qty = (int) $request->qty;
			$color=$request->color;
			$size=$request->size;
			if($productId <=0 || $qty <=0)
			{
				return $this->ajaxResponse(false, "You have entered worng input");
			}
			else
			{	
				$product = \App\Model\Products::where("status", 1)->where("product_id", $productId)->first();
				if(!empty($product)){
					$totalPrice = $qty * $product->price;
					$productCart = new \App\Model\ProductCart();
					$productCart->user_id = \Auth::guard('frontUser')->user()->id;
					$productCart->product_id = $productId;
					$productCart->user_session_id= $request->session()->getId();
					$productCart->qty = $qty;
					$productCart->color = $color;
					$productCart->size = $size;
					$productCart->total_price = $totalPrice;
					$productCart->created_at = date('Y-m-d H:i:s');
					
					$productCart->save();
								
					return $this->ajaxResponse(true, '');
				}else{
					return $this->ajaxResponse(false, "This product is not avalable.");
				}	
			}
		} catch (Exception $ex) {
            return $this->ajaxResponse(false, $ex->getMessage());
        }
	}
	
	private function setCartInSession($request)
	{	
		try{
			
			$productId = (int) $request->productId;
			$qty = (int) $request->qty;
			if($productId <=0 || $qty <=0)
			{
				return $this->ajaxResponse(false, "You have entered worng input");
			}
			else
			{
				$product = \App\Model\Products::where("status", 1)->where("product_id", $productId)->first();
				if(count(['$product']) == 1)
				{
					$totalPrice = $qty * $product->price;
					$sessioncart = array(
						'product_id' => $productId,
						'qty' => $qty,
						'total_price' => $totalPrice
						);
					if ($request->session()->has('userSessionCart')) 
					{
						$request->session()->push('userSessionCart', $sessioncart);	
					}	
					else
					{
						$request->session()->put('userSessionCart', $sessioncart);
					}
					$request->session()->put('redirectTo', 'checkout');
					$request->session()->put('redirectTo', 'checkout');
					return $this->ajaxResponse(true, '', null, 200);
				}
				else
				{
					return $this->ajaxResponse(false, "This product is not avalable.");
				}	
			}
		} catch (Exception $ex) {
            return $this->ajaxResponse(false, $ex->getMessage());
        }
	}
	

}
