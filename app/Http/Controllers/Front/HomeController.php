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
		return view('homepage',array('homeTitle'=>$homeTitle,'data'=>$data,'Categories'=>$Categories));
		
    }
	
}