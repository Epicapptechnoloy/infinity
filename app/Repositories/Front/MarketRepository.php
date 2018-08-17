<?php

namespace App\Repositories\Front;

use App\Model\Products;
use App\Model\Categories;
use App\Model\SubCategory;
use App\Model\ProductCart;
use App\Model\ProductColors;
use App\Model\ProductSizes;
use App\Model\Review;
use DB;


class MarketRepository 
{
    public function getAllCategories(){
		$Categories = Categories::with('SubCategory')->get();
		return $Categories;
	}
	
	public function getBillingAdress($uid){
		return $userAdd = UserBillingAddress::where('user_id',$uid)->get();
	}
	 
	public function getProductCart($uid){
		return $productCart = ProductCart::where('user_id',$uid)->get();
	} 
	 
	public function getAllProductColors(){
		$productColors = ProductColors::where('status', 1)->get();
		return $productColors;
	} 
	
	public function getAllProductSizes()
	{
		$productSizes = ProductSizes::where('status', 1)->get();
		return $productSizes;
	}
	
	
	/* public function getAllProduct(){
		$products = Products::where('status', 1)->get();
		return $products;
	} */
	
	public function getProductById($id)
	{
		$product = Products::where('product_id', $id)->first();
		return $product;
	}
	
	
	public function getProductMaxPrice(){
		$query = DB::table('sb_product')
					->select(DB::raw('max(price) as maxprice'))->where('status', 1);
		$products = $query->first();
		return $products;
	}
	
	public function getAllProducts($filters=null){
		
		$query = DB::table('sb_product AS p')->where('p.status', 1);
							
		if(isset($filters['keyword']) && trim($filters['keyword']) != "")
		{
			
			$query->where('p.name', 'like', '%'.$filters['keyword'].'%');
		}
		if(isset($filters['subcategory']) && trim($filters['subcategory']) != "")
		{
			
			$subcategoryId = (int) $filters['subcategory'];
			$query->where('p.sub_category_id', $subcategoryId);
			
		}
		if(isset($filters['color']) && trim($filters['color']) != "")
		{
			$colorId = (int) $filters['color'];
			$query->where('p.color_id',$colorId);
		}
		if(isset($filters['price']) && trim($filters['price']) != "")
		{
			$query->where('p.price', '<=', $filters['price']);
			
		}
		if(isset($filters['size']) && trim($filters['size']) != "")
		{
			$sizeId = (int) $filters['size'];
			$query->where('p.size_id', $sizeId);
		}
		$products = $query->groupBy('p.product_id')->paginate(env('RECORD_PER_PAGE'));
		return $products;
	}
	
	
}
