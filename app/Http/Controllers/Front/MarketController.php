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

class MarketController extends Controller
{
	
	private $marketRepository;
	
	public function __construct(){
        $this->marketRepository = new MarketRepository();
    }	
	
	public function market(){
		$data = array();
		$data['homeTitle'] = 'Infinity.com'; 
		$data['categories'] = $this->marketRepository->getAllCategories();
		//$data['subcategories'] = $this->marketRepository->getSubCategory();
		//$data['products'] = $this->marketRepository->getAllProducts();	
		//dd($data);
        return view('front/market/category-filter', $data);
		
    }
	
	
	
}
