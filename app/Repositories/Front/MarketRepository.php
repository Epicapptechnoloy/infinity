<?php

namespace App\Repositories\Front;

use App\Model\Products;
use App\Model\Categories;
use App\Model\SubCategory;
use App\Model\ProductCart;

use DB;


class MarketRepository 
{
    public function getAllCategories()
	{
		$categories = Categories::where('status', 1)->get();
		return $categories;
	}
	
	
}
