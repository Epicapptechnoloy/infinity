<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use App\Model\User;
use App\Model\Products;
use App\Model\Categories;
use Socialite;
use DB;
use File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Front\MarketRepository as MarketRepository;
//use Illuminate\Contracts\Auth\Authenticatable;

class HomeController extends Controller
{
    //
	
	/**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
	 
    private $marketRepository;
	
	public function __construct(){
        $this->marketRepository = new MarketRepository();
    }	
	
	public function home(){
		$data = array();
		$homeTitle = 'Infinity.com'; 
		$Categories = Categories::with('SubCategory')->get();
		
		return view('homepage',array('homeTitle'=>$homeTitle,'data'=>$data,'c_data'=>$Categories));
		
    }
	
	/* public function showProductList($id){
		$homeTitle = 'showProductList';
		$Products=new Products;
		$products = $Products->getProductById($id);
		return view('customer.show-product',array('homeTitle'=>$homeTitle,'products'=>$products));
	}	
    
	public function postProduct(Request $request)
    {	
		$validation = Validator::make($request->all(), [
			'size' 	=> 'required',
            'color' => 'required',
        ]);
	}
	
	
	public function processCart(Request $request)
    {
        $homeTitle = 'Cart';
			$products=Products::all();
			return view('customer.cart',array('homeTitle'=>$homeTitle,'products'=>$products));
	}
	
	public function deleteProduct($id){
		if(!empty($id)){
			$paroducts=Products::where('product_id', $id)->first();
		}
		if($paroducts->image){
			$dir='public/assets/front/img/'.$paroducts->image;
	        File::delete($dir);
	    } 
        $paroducts->delete();
       
		return redirect()->route("cart"); 
	}
	

	public function processCheckOut(Request $request)
    {
        $homeTitle = 'Checkout';
		return view('customer.checkout',array('homeTitle'=>$homeTitle));
	
	}	 */

}