<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Model\Admin;
use App\Model\Orders;
use App\Model\Products;
use App\Model\Settings;
use App\Model\Countries;
use App\Model\States;
use App\Model\Events;
use App\Model\Categories;

use App\Model\Wishlists;
use App\Model\Blogs;
use DB;
use carbon\Carbon;
use App\Model\ProductImage;
use File;

class ProductController extends Controller
{
	const STATUS = 1;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function productList(Request $request)
    {
		
        $sort_by = $request->get('sort-by');
        $order_by = $request->get('order-by');
            
		$products = new Products();
        $homeTitle = 'Product List'; 
        if(!empty($request->s)){
            $products = $products->where('name','like', '%'.$request->s.'%')->orwhere('model','like', '%'.$request->s.'%'); 
        }
        if(!empty($request->status)){
			if($request->status==1){
			$products = $products->where('status',1);
			}
			else if ($request->status==2){
			$products = $products->where('status',0);
			}
		}   
		 //sorting based on status
        if($sort_by == 'status' && $order_by == 'desc'){
            $products->where('status', 1);
        }
        if($sort_by == 'status' && $order_by == 'asc'){
            $products->orderBy('status',0);
        } 
		$products =  $products->paginate(env('RECORD_PER_PAGE'));   
        $products->appends($request->s,$request->status);	
        return view('admin.products.product_list',array('homeTitle'=>$homeTitle,'products'=>$products,'params'=>$request))
        ->with('i', ($request->input('page', 1) - 1) * env('RECORD_PER_PAGE'));
    }

/***********
***Author       : Ajay Kumar
***Action       : AddProductForm
***Description  : This action is use to show the product form
***Date         : 04-07-2018
***Params       : param
***return       : @return \Illuminate\Http\Response
*************/  
    public function AddProductForm(Request $request){
        $homeTitle = 'Add Product';
        $categories = Categories::all();
        return view('admin.products.add-product',array('homeTitle'=>$homeTitle,'categories'=>$categories)); 
    }
    
/***********
***Author       : Ajay Kumar
***Action       : AddProduct
***Description  : This action is use to save the global product
***Date         : 05-07-2018
***Params       : category data
***return       : @return \Illuminate\Http\Response
*************/  
    public function AddProduct(Request $request){
		
        $homeTitle = 'Add Product';
        $products = new Products();
        $products->name = $request->name;        
        $products->model = $request->model;        
        $products->sku = $request->sku;
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->size = $request->size;
        $products->color = $request->color;
        $products->points = $request->points;
        $products->weight = $request->weight;
		$products->category_id = $request->category;
		$image = $request->file('image');
			if($image){
				$input['imagename'] = rand(1,999).time().'.'.$image->getClientOriginalExtension();
				$categoryRootPath = public_path("/uploads/product/image");
				
				if(!File::exists($categoryRootPath)) {
					File::makeDirectory($categoryRootPath, 0777, true, true);                                
				}
				$image->move($categoryRootPath, $input['imagename']);
				//$Orgn = Orgnisation::where('id',$Orgnisation->id)->update(
					//	 array('logo'=>$input['imagename']));
					$products->image = $input['imagename'];					
			}
        $products->save();
        $request->session()->flash('alert-success', 'Product was successful added!');
        return redirect()->route("admin.product-list");
        
    }                                                                          
 /***********
***Author       : Ajay Kumar
***Action       : customersWishList
***Description  : This action is use to view cstomer wishlist product
***Date         : 05-07-2018
***Params       : category data
***return       : @return \Illuminate\Http\Response
*************/  
    public function customersWishList(Request $request){
        $homeTitle = 'Customers WishList Product';
		
		$wishlists = Wishlists::all();
	
        return view('admin.products.wishlist',array('homeTitle'=>$homeTitle,'wishlists'=>$wishlists)); ;
        
    } 
	 /***********
	***Author       : Ajay Kumar
	***Action       : removeFromWishlist
	***Description  : This action is use to removed wishlist product
	***Date         : 05-07-2018
	***Params       : category data
	***return       : @return \Illuminate\Http\Response
	*************/  
	public function removeFromWishlist($cid, $pid){
        $homeTitle = 'Removed Customers WishList Product';      
		$wishlists = Wishlists::where('product_id',$pid)->where('user_id',$cid)->delete();        
       \Session::flash('alert-success', 'Product was successfulLY removed from wishlist!');
               return redirect()->route("admin.wishlist");
      
    }



	public function viewProduct(Request $request){
		$homeTitle = 'View Product'; 
		$sort_by = $request->get('sort-by');
        $order_by = $request->get('order-by');
		$Product = DB::table('sb_product')
				->select('sb_product.*','sb_product.status as productStatus','sb_product.name as productName','sb_product.image as productImage','sb_category.*',
				'sb_category.name as CategoryName')
				->leftJoin('sb_category', 'sb_category.category_id', '=', 'sb_product.category_id')->where('product_id',base64_decode($request->product_id))->first(); 
			
			
        return view('admin.products.show',array('homeTitle'=>$homeTitle,'Product'=>$Product));
    }
 
	
	
	public function editProduct(Request $request){
		//dd(base64_decode($request->product_id));
		$homeTitle = 'Edit Product';
		$categories = Categories::select('category_id', 'name')->where('status', 1)->get();
		$Products = DB::table('sb_product')
			->select('sb_product.*','sb_product.status as productStatus','sb_product.name as productName','sb_product.image as productImage','sb_product.description as productDescription','sb_category.*',
			'sb_category.name as CategoryName')
			->leftJoin('sb_category', 'sb_category.category_id', '=', 'sb_product.category_id')->where('product_id',base64_decode($request->product_id))->first();
		//dd($Products->productDescription);
        return view('admin.products.edit-product',array('homeTitle'=>$homeTitle,'Products'=>$Products,'categories'=>$categories)); 
    }
	
	public function editProductPost(Request $request){
    
		$validation = Validator::make($request->all(), [            
            'name'   => 'required',
            'price'   => 'required',
            'quantity'   => 'required',
            'status'       => 'required',              
        ]);
		if ($validation->fails()){ 
            return redirect()->back()->withErrors($validation)->withInput($request->all()); 
        }
		
		try{
			DB::beginTransaction();
			$Products =Products::where('product_id',$request->productId)->first();
			$Products->name = $request->name;
			$Products->model = $request->model;
			$Products->sku = $request->sku;
			$Products->price = $request->price;
			$Products->description = $request->description;
			$Products->size = $request->size;
			$Products->color = $request->color;
			$Products->points = $request->points;
			$Products->weight = $request->weight;
			$Products->category_id = $request->category;
			$Products->quantity = $request->quantity;
			$Products->status = $request->status;
			
			 $image = $request->file('productImage');
				if($image){
					$input['imagename'] = rand(1,999).time().'.'.$image->getClientOriginalExtension();
					$categoryRootPath = public_path("/uploads/product/image");
					
					if(!File::exists($categoryRootPath)) {
						File::makeDirectory($categoryRootPath, 0777, true, true);                                
					}
					$image->move($categoryRootPath, $input['imagename']);
					
						$Products->image = $input['imagename'];					
				}
			
			$Products->update();
			DB::commit();
			//dd($Products);
			$request->session()->flash('alert-success', 'Product Updated successfully!');
			return redirect()->route("admin.product-list");
		}catch(\Illuminate\Database\QueryException $e){
			DB::rollBack();
			return redirect()->back()->withErrors(['Oops ! some thing is wrong.'])->withInput($request->all());
		} 
    }
	
	public function deleteProduct($product_id,Request $request){
	
        $products = Products::find($product_id);        
        if($products)
			$products->delete();	
							
		\Session::flash('alert-success', 'Product deleted successfully');
        return redirect()->route("admin.product-list");               
        

    }	
	
	
}
