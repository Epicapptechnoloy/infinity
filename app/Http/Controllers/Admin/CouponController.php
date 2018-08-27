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
use App\Model\Categories;
use App\Model\States;
use App\Model\Coupons;
use DB;
use carbon\Carbon;
use Session;
use File;
use App\Model\ProductImage;
class CouponController extends Controller
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
    public function couponList(Request $request)
    {  
		$sort_by = $request->get('sort-by');
		$order_by = $request->get('order-by');
		$coupons = new Coupons();
        $homeTitle = 'Discounts and Offers'; 
        if(!empty($request->s)){
            $coupons = $coupons->where('coupon_code','like', '%'.$request->s.'%')->orwhere('discount','like', '%'.$request->s.'%'); 
        }
        if(!empty($request->status)){
			if($request->status==1){
			$coupons = $coupons->where('status',1);
			}
			else if ($request->status==2){
			$coupons = $coupons->where('status',0);
			}
		}   
		
        if($sort_by == 'status' && $order_by == 'desc'){
            $coupons->where('status', 1);
        }
        if($sort_by == 'status' && $order_by == 'asc'){
            $coupons->orderBy('status',0);
        } 
		$coupons =  $coupons->paginate(env('RECORD_PER_PAGE'));   
        $coupons->appends($request->s,$request->status);
		return view('admin.coupons.coupon-list',array('homeTitle'=>$homeTitle,'coupons'=>$coupons,'params'=>$request, 'sort_by'=> $sort_by , 'order_by' => $order_by))
			->with('i', ($request->input('page', 1) - 1) * env('RECORD_PER_PAGE'));
    }

   
    public function AddCouponForm()
    {        
        $homeTitle ="Add Discount and Offers";
		$categories = Categories::all();
        return view('admin.coupons.add-coupon',array('homeTitle'=>$homeTitle,'categories'=>$categories));
    }
    /**
     * Auther: Ajay kumar
     * method: To add the new coupon
     * Date	 :  27-08-2018
     * @return \Illuminate\Http\Response
     */
    public function AddCoupon(Request $request)
    {   
		$validation = Validator::make($request->all(), [            
            'name'   => 'required',
            'code'   => 'required',
            'minimum_order'   => 'required',
            'status'       => 'required',              
        ]);
		if ($validation->fails()){ 
            return redirect()->back()->withErrors($validation)->withInput($request->all()); 
        }
	
		$coupon = new Coupons();
		if ($request->isMethod('post')) {
			DB::beginTransaction();
            try {
				$coupon->name = $request->name;
				$coupon->coupon_code = $request->code;
				$coupon->discount = $request->discount;
				$coupon->amount_limit = $request->minimum_order;
				$coupon->description = $request->description;
				
				$coupon->category_id = $request->category;
				
				$coupon->valid_from = date('Y-m-d', strtotime($request->validfrom));
				$coupon->valid_to = date('Y-m-d', strtotime($request->validto));
				
				$coupon->status = $request->status;
				
				$coupon->save();
				
				DB::commit();
				
				 \Session::flash('alert-success','Coupon has been added successfully');                        
				return redirect()->route('admin.coupon-list');
			}
			catch (\Exception $e) {
				DB::rollBack();                    
				return back()->withInput($request->input())->withErrors([$e->getMessage()]);
			}
		}    
        return view('admin.coupons.add-coupon',array('homeTitle'=>$homeTitle));
    }
    
	/***********
	***Author       : Ajay Kumar
	***Action       : show
	***Description  : This action is use to view the Coupan 
	***Date         : 27-08-2018
	***Params       : @coupan_id
	***return       : @return \Illuminate\Http\Response
	*************/  
	
     public function show($id){
        $coupon = Coupons::find($id);
		
        return view('admin.coupons.show', [
            'coupon' => $coupon
        ]);

    }
    
	/***********
	***Author       : Ajay Kumar
	***Action       : show
	***Description  : This action is use to edit the Coupan 
	***Date         : 27-08-2018
	***Params       : @coupan_id
	***return       : @return \Illuminate\Http\Response
	*************/  
	
    public function edit($id){
		$categories = Categories::all();
        $coupon = Coupons::find($id);
        return view('admin.coupons.edit-coupon', [
            'coupon' => $coupon, 'categories' => $categories
         ]);

    }
    
	/***********
	***Author       :Ajay Kumar
	***Action       : show
	***Description  : This action is use to update the Coupan 
	***Date         : 27-08-2018
	***Params       : @coupan_id
	***return       : @return \Illuminate\Http\Response
	*************/  
	
    public function update(Request $request){
		$validation = Validator::make($request->all(), [            
            'name'   => 'required',
            'code'   => 'required',
            'minimum_order'   => 'required',
            'status'       => 'required',              
        ]);
		if ($validation->fails()){ 
            return redirect()->back()->withErrors($validation)->withInput($request->all()); 
        }
		try{
			DB::beginTransaction();
				$coupon =Coupons::where('coupon_id',$request->couponId)->first();
				$coupon->name = $request->name;
				$coupon->coupon_code = $request->code;
				$coupon->discount = $request->discount;
				$coupon->amount_limit = $request->minimum_order;
				$coupon->description = $request->description;
				
				$coupon->category_id = $request->category;
				
				$coupon->valid_from = date('Y-m-d', strtotime($request->validfrom));
				$coupon->valid_to = date('Y-m-d', strtotime($request->validto));
				
				$coupon->status = $request->status;
				$coupon->save();
				DB::commit();
				\Session::flash('alert-success','Coupan has been updated successfully');                        
				return redirect()->route('admin.coupon-list');
			}
			catch (\Exception $e) {       
				DB::rollBack();                    
				return back()->withInput($request->input())->withErrors([$e->getMessage()]);
			}
    }
    
        

	/***********
	***Author       : Ajay Kumar
	***Action       : destroy
	***Description  : This action is use to view the coupon 
	***Date         : 27-08-2018
	***Params       : @coupon_id
	***return       : @return \Illuminate\Http\Response
	*************/  
    
    public function destroy($id,Request $request){
		
        $coupon = Coupons::find($id);        
        if($coupon)
			$coupon->delete();						
		\Session::flash('alert-success', 'Coupon deleted successfully');
        return redirect()->route("admin.coupon-list");               
    }
	 
}
