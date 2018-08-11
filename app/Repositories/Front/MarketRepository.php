<?php

namespace App\Repositories\Front;

use App\Model\Products;
use App\Model\Categories;
use App\Model\SubCategory;
use App\Model\ProductCart;
use App\Model\ProductColors;
use App\Model\ProductSizes;
use DB;


class MarketRepository 
{
    public function getAllCategories(){
		$Categories = Categories::with('SubCategory')->get();
		return $Categories;
	}
	
	/* 
	public function getAllSubCategoryByName() {
		$subcategories = DB::table('sb_sub_category as SC')
                ->select('SC.name as SubCategoryName', 'SC.description as SubCategoryDescription', 'SC.image as subCategoryImage', 'C.name as categoryName')
                ->join('sb_category as C', 'C.category_id', '=', 'SC.category_id')->get();
		return $subcategories;
	}*/
	
	 
	/* public function getAllProductByColor(){
		$productColors = DB::table('sb_product')->select('color')->get();
		return $productColors;
	} 
	
	public function getAllProductBySize(){
		$productSize = DB::table('sb_product')->select('size')->get();
		return $productSize;
	} 	
	  */
	public function getAllProduct(){
		$products = Products::where('status', 1)->get();
		return $products;
	}
	
	
	
	
}
