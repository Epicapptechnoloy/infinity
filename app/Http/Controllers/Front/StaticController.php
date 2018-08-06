<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class StaticController extends Controller
{
	public function success(){
		$homeTitle = 'Success | Infinity'; 
        return view('front.static.sucess',array('homeTitle'=>$homeTitle));
    }
	
}
