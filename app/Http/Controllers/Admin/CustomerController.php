<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Model\Countries;
use App\Model\Admin;
use App\Model\Orders;
use App\Model\Products;
use App\Model\Settings;

use App\Model\States;
use App\Model\Cities;
use App\Model\Blogs;
use App\Model\Wishlists;
use DB;
use carbon\Carbon;

use File;
use App\Model\ProductImage;
class CustomerController extends Controller
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
    public function index()
    {
        $Arr = array();
        $homeTitle = 'Admin\'s Dashboard';
        return view('admin.home',array('homeTitle'=>$homeTitle,'data'=>$Arr));
    }

	
    /**
     * Show the application patient list.
     *
     * @return \Illuminate\Http\Response
     */
	public function CustomerList(Request $request) {
        $Countries = Countries::select('country_id', 'country_name')->where('status', 1)->get();
        $States = States::select('id', 'name')->where('status', 1)->get();
        $query = DB::table('users as U')
                ->select('U.id', 'U.name', 'U.email','U.number', 'U.status', 'C.country_name', 'S.name as state_name')
                ->leftJoin('sb_countries as C', 'U.country_id', '=', 'C.country_id')
                ->leftJoin('sb_states as S', 'U.state_id', '=', 'S.id')
                ->where('U.status', '!=', 2);
        if ($request->has('s')) {
            $query->where('U.name', 'like', '%' . $request->s . '%')->orWhere('U.email', 'like', '%' . $request->s . '%');
        }
        if ($request->has('status')) {
            $query->where('U.status', $request->status);
        }
		if($request->has('export')){
            return $this->_userExport($query);
        }
        $customers =  $query->paginate(env('RECORD_PER_PAGE')); 
        return view('admin.customers.customer-list', [
			'homeTitle' => 'User List',
			'Countries' => $Countries,
			'States' => $States,
			'customers' => $customers,
			'totalAppUsers' => User::all()->count(),
			'params' => $request,
		])->with('i', ($request->input('page', 1) - 1) * env('RECORD_PER_PAGE'));
    }
	
	/***********
	***Author       : Ajay Kumar
	***Action       : show
	***Description  : This action is use to view the customer 
	***Date         : 03-07-2018
	***Params       : @customer_id
	***return       : @return \Illuminate\Http\Response
	*************/     
	public function show($id){		 
        $customer = User::find(base64_decode($id));
        return view('admin.customers.view-user', [
            'customer' => $customer
         ]);

    }
	
	
	public function showOrder(Request $request,$id){
	
	   $UserId=base64_decode($id);
	   $sort_by = $request->get('sort-by');
       $order_by = $request->get('order-by');
	   $homeTitle = 'Order List';
		$orderList = DB::table('sb_order')
			->select('sb_order.*','sb_order.created_at as orderDate','users.*',
				'users.name as userName')
			->leftJoin('users', 'users.id', '=', 'sb_order.user_id')->where('user_id',$UserId)->get(); 
		return view('admin.customers.orderlist',array('homeTitle'=>$homeTitle,'orderList'=>$orderList,'params'=>$request ))
		->with('i', ($request->input('page', 1) - 1) * env('RECORD_PER_PAGE'));   
    }
	
	/***********
	***Author       : Ajay Kumar
	***Action       : show
	***Description  : This action is use to view the order 
	***Date         : 10-07-2018
	***Params       : @order_id
	***return       : @return \Illuminate\Http\Response
	*************/  
	
    public function viewOrderDetails(Request $request, $id){
		$OrderId=base64_decode($id);
		$homeTitle = 'Order Details';
		$orderdetails = DB::table('sb_order_details')
			->select('sb_order_details.*','sb_order_details.delivered_status as orderDetailStatus','sb_order_details.qty as orderDetailQty','sb_product.*',
			'sb_product.name as productName')
			->leftJoin('sb_product', 'sb_product.product_id', '=', 'sb_order_details.product_id')->where('order_id',base64_decode($id))->get(); 
		return view('admin.customers.view-order',array('homeTitle'=>$homeTitle,'orderdetails'=>$orderdetails,'OrderId'=>$OrderId,'params'=>$request))
		->with('i', ($request->input('page', 1) - 1) * env('RECORD_PER_PAGE'));
        
    }
	
	
	
	public function showWishlist(Request $request,$id){
		$UserId=base64_decode($id);
	    $homeTitle = 'Wish List';
		$wishList = DB::table('sb_product')
			->select('sb_product.*','sb_product.status as productStatus','sb_product.name as productName','sb_customer_wishlist.*')
			->leftJoin('sb_customer_wishlist', 'sb_customer_wishlist.product_id', '=', 'sb_product.product_id')->where('user_id',$UserId)->get(); 
		return view('admin.customers.wishlist',array('homeTitle'=>$homeTitle,'wishList'=>$wishList,'params'=>$request))
		->with('i', ($request->input('page', 1) - 1) * env('RECORD_PER_PAGE'));   
    }
	
	
	public function showCart(Request $request,$id){
		$UserId=base64_decode($id);
	    $homeTitle = 'Cart List';
		$cartList = DB::table('sb_product')
			->select('sb_product.*','sb_product.status as productStatus','sb_product.name as productName','sb_product_cart.*')
			->leftJoin('sb_product_cart', 'sb_product_cart.product_id', '=', 'sb_product.product_id')->where('user_id',$UserId)->get(); 
		return view('admin.customers.cartlist',array('homeTitle'=>$homeTitle,'cartList'=>$cartList,'params'=>$request))
		->with('i', ($request->input('page', 1) - 1) * env('RECORD_PER_PAGE'));   
    }
	
	
	public function showReview(Request $request,$id){
		$UserId=base64_decode($id);
	    $homeTitle = 'Review List';
		$reviewList = DB::table('sb_product')
			->select('sb_product.*','sb_product.status as productStatus','sb_product.name as productName','sb_review.*')
			->leftJoin('sb_review', 'sb_review.product_id', '=', 'sb_product.product_id')->where('user_id',$UserId)->get(); 
		return view('admin.customers.reviewlist',array('homeTitle'=>$homeTitle,'reviewList'=>$reviewList,'params'=>$request))
		->with('i', ($request->input('page', 1) - 1) * env('RECORD_PER_PAGE'));   
    }
	

	/***********
	***Author       : Ajay Kumar
	***Action       : destroy
	***Description  : This action is use to view the customer 
	***Date         : 03-07-2018
	***Params       : @customer_id
	***return       : @return \Illuminate\Http\Response
	*************/  
    public function destroy($id,Request $request){
        $customer = User::find($id);        
        if($customer)
			$customer->delete();						
		\Session::flash('alert-success', 'Customer deleted successfully');
        return redirect()->route("admin.customers");               
        

    }
	/***********
	***Author       : Rajiv kumar
	***Action       : customerFeatureUpdate
	***Description  : make customer featrued or unfeature
	***Date         : 13-01-2018
	***Params       : customer id,featurestatus
	***return       : customer update status 
	*************/    
    public function customerFeatureUpdate(Request $request){
        if($request->customer_id){
           DB::beginTransaction();
            try {
                $customer  = User::where('id',$request->customer_id)->first();
                $customer->isVerified = $request->isVerified;
                $customer->save();
                $data =  array (
                  'status' => 1,
                  'error' => 0,
                  'msg'   => 'Action performed Successfully.',          
                );
                DB::commit();                

            }catch (\Exception $e) {
                    DB::rollBack();
                    $data =  array (
                        'status' => 0,
                        'error' => 1,
                        'msg'   => $e->getMessage(),          
                    );                    
                } 
        }else{
          $data =  array (
          'status' => 0,
          'error' => 1,
          'msg'   => 'customer id is missing',          
          );   
        }
        return json_encode($data);
    }
	/***********
	***Author       : Rajiv kumar
	***Action       : customerStatusUpdate
	***Description  : make customer active or inactive
	***Date         : 13-01-2017
	***Params       : customer id,customerStatus
	***return       : customer update status 
	*************/
	
    public function customerStatusUpdate(Request $request){
      if($request->customer_id){
           DB::beginTransaction();
            try {
                $customer  = User::where('id',$request->customer_id)->first();
                $customer->status = $request->customerStatus;
                $customer->save();
                $data =  array (
                  'status' => 1,
                  'error' => 0,
                  'msg'   => 'Action performed Successfully.',          
                );
                DB::commit();
            }catch (\Exception $e) {
                    DB::rollBack();
                    $data =  array (
                        'status' => 0,
                        'error' => 1,
                        'msg'   => $e->getMessage(),          
                    );                    
                } 
        }else{
          $data =  array (
          'status' => 0,
          'error' => 1,
          'msg'   => 'customer id is missing',          
          );   
        }
        return json_encode($data);  
    }
    
	/***********
	***Author       : Rajiv Kumar
	***Action       : newCustomer
	***Description  : This action is use to add newCustomer
	***Date         : 07-01-2018
	***Params       : null
	***return       : @return \Illuminate\Http\Response
	*************/      
	public function newCustomer(Request $request){		
		$homeTitle = 'New Customer';	
		$countries   = Countries::where('status',1)->orderBy('name','ASC')->get();
		return view('admin.customers.add',array('homeTitle'=>$homeTitle,'countries'=>$countries));        
	}
    
    
	/***********
	***Author       : Ajay kumar
	***Action       : addNewCustomer
	***Description  : make add new customer
	***Date         : 13-01-2017
	***Params       : customer date
	***return       : customer 
	*************/     
    public function addNewCustomer(Request $request){
      if($request->isMethod('POST')){
		   $this->validate($request, [                        
            "name"                => "required|string",
            "email"                     => "unique:users,email",
            "password"                  => "required|min:6",
            "password_confirm"          => "required|same:password",
            "address"       => "required",
            "country"       => "required|not_in:0",
            "state"         => "required|not_in:0",
            "city"          => "required|not_in:0",
            "number"      => "required|min:10",
            "pincode"          => "required|min:6"           
        ]);
           DB::beginTransaction();
            try {
                $customer  = new User();
                $customer->name = $request->name;
                $customer->email = $request->email;                
                $customer->password = $request->password;
                $customer->number = $request->number;
                $customer->address = $request->address;
                $customer->cityId = $request->city;
                $customer->stateId = $request->state;
                $customer->countryId = $request->country;
                $customer->zipcode = $request->pincode;
                $customer->status = $request->status;
                $customer->save();
                $request->session()->flash('alert-success', 'Customer was successfully added!');
                return redirect()->route("admin.customers");
                DB::commit();
            }catch (\Exception $e) {
				DB::rollBack();
				$request->session()->flash('alert-danger', 'Customer not added!');
				return redirect()->back()->withErrors('warning','Customer not added!');                 
			} 
        }
        return redirect()->back()->withErrors('warning','method not allowd!');
         
    }
    
	/***********
	***Author       : Ajay Kumar
	***Action       : edit
	***Description  : This action is use to edit Customer 
	***Date         : 03-07-2018
	***Params       : @customer_id
	***return       : @return \Illuminate\Http\Response
	*************/      
     public function edit($name,$id){
			$homeTitle = 'Edit Customer';
			$countries   = Countries::all();  
			$user = User::find(base64_decode($id));
		    $states     = States::all();
        return view('admin.customers.edit',array('homeTitle'=>$homeTitle,'customer'=>$user,'countries'=>$countries,'states'=>$states));        
    }
    
    
	/***********
	***Author       : Ajay kumar
	***Action       : updateCustomer
	***Description  : function is use to update customer
	***Date         : 03-07-2018
	***Params       : customer data
	***return       : customer 
	*************/     
    public function updateCustomer(Request $request){
      if($request->customer_id){
           if($request->isMethod('POST')){
			   $this->validate($request, [                        
				"name"                => "required|string",
				"email"                     => "required",
				"address"       => "required",
				"number"      => "required|min:10",
				"pincode"          => "required|min:6"           
			]);
			   DB::beginTransaction();
				try {
					$customer = User::where('id',$request->customer_id)->first();
					$customer->name = $request->name;
					$customer->email = $request->email;                
					$customer->number = $request->number;
					$customer->address = $request->address;
					$customer->zipcode = $request->pincode;
					$customer->status = $request->status;
					$customer->update();
					DB::commit();
					$request->session()->flash('alert-success', 'User was successfully added!');
					return redirect()->route("admin.customers");
				}catch (\Exception $e) {
					DB::rollBack();
					$request->session()->flash('alert-danger', 'Customer not updated!');
					return redirect()->back()->withErrors('warning','Customer not updated!');                 
				} 
			}      
        }else{
			$request->session()->flash('alert-danger', 'Customer not updated!');
			return redirect()->back()->withErrors('warning','Customer not added!'); 
        }
        return json_encode($data);  
    }
    
}
