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
use App\Model\OrderDetails;
use App\Model\Products;
use App\Model\Settings;
use App\Model\Countries;
use App\Model\States;


use App\Model\Blogs;
use DB;
use carbon\Carbon;

use File;
use App\Model\ProductImage;
class OrderController extends Controller
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
     * Show the application Order list.
     *
     * @return \Illuminate\Http\Response
     */
    public function OrderList(Request $request){
		
		$orders = DB::table('sb_order')
			->select('sb_order.*','sb_order.created_at as orderDate','users.*',
				'users.name as userName')
			->leftJoin('users', 'users.id', '=', 'sb_order.user_id')->get(); 
			//dd($orders);
			$homeTitle = 'Order List';
			
			return view('admin.orders.order-list',array('homeTitle'=>$homeTitle,'orders'=>$orders,'params'=>$request))->with('i', ($request->input('page', 1) - 1) * env('RECORD_PER_PAGE'));                
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
		//dd($OrderId);
		$homeTitle = 'Order Details';
		$orderdetails = DB::table('sb_order_details')
			->select('sb_order_details.*','sb_order_details.delivered_status as orderDetailStatus','sb_order_details.qty as orderDetailQty','sb_product.*',
			'sb_product.name as productName')
			->leftJoin('sb_product', 'sb_product.product_id', '=', 'sb_order_details.product_id')->where('order_id',base64_decode($id))->get(); 
		return view('admin.orders.view-order',array('homeTitle'=>$homeTitle,'orderdetails'=>$orderdetails,'OrderId'=>$OrderId,'params'=>$request))
		->with('i', ($request->input('page', 1) - 1) * env('RECORD_PER_PAGE'));
        
    }
	
	
	public function viewInvoiceDetails(Request $request, $id){
		//dd($id);
		 $OrderId=base64_decode($id);
		//dd($OrderId);
		$homeTitle = 'Invoice Details';
		
		$invoiceNo = Orders::find(base64_decode($id));
		
		//dd($invoiceNo->created_at);
		
		
		$invoiceDetails = DB::table('sb_order_details')
			->select('sb_order_details.*','sb_order_details.delivered_status as orderDetailStatus','sb_order_details.qty as orderDetailQty','sb_product.*',
			'sb_product.name as productName')
			->leftJoin('sb_product', 'sb_product.product_id', '=', 'sb_order_details.product_id')->where('order_id',base64_decode($id))->get();
		//dd($invoiceDetails);
		return view('admin.orders.view-invoice-no',array('homeTitle'=>$homeTitle,'invoiceDetails'=>$invoiceDetails,'OrderId'=>$OrderId,'invoiceNo'=>$invoiceNo,'params'=>$request))
		->with('i', ($request->input('page', 1) - 1) * env('RECORD_PER_PAGE')); 
    }
	 
	/***********
	***Author       : Ajay Kumar
	***Action       : updateStatus
	***Description  : This action is use to update the order status
	***Date         : 10-07-2018
	***Params       : @order_id
	***return       : @return \Illuminate\Http\Response
	*************/  
		public function updateStatus(Request $request){
			
			if($request->isMethod('POST') && !empty($request->status)){
				$order = OrderDetails::where(['order_id'=>$request->orderId,'product_id'=> $request->productId])->update(array('delivered_status'=>$request->status));
				
				\Session::flash('alert-success','Order has been updated successfully');
				return redirect()->back();
			}else{
				\Session::flash('alert-warning','Oh! Order could not be updated!');
				return redirect()->back();
			}
		}
		
	/***********
***Author       : Ajay Kumar
***Action       : destroy
***Description  : This action is use to delete category 
***Date         : 09-07-2018
***Params       : @category_id
***return       : @return \Illuminate\Http\Response
*************/  
    
    public function destroy($id,Request $request){
		
        $order = Orders::find($id);        
        if($order)
			$order->delete();	
							
		\Session::flash('alert-success', 'Order deleted successfully');
        return redirect()->route("admin.order-list");               
        

    }	
		
		
}
