<?php
namespace App\Helpers;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Config;
use Auth;
use App\Model\ProductCart;

Class Helpers{
    
	public static function totaUserCart() {
		$totaluserCart = ProductCart::where(['user_id'=>Auth::guard('frontUser')->user()->id])->count();
		return $totaluserCart;		
    }
}

