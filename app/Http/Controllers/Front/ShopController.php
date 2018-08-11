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
		$data['products'] = $this->marketRepository->getAllProduct();
		$data['Categories'] = $this->marketRepository->getAllCategories();
		//$data['productColors'] = $this->marketRepository->getAllProductByColor();
		//$data['productSize'] = $this->marketRepository->getAllProductBySize();
		//dd($data);
        return view('front/shop/shop', $data);
    }
	

}
