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
use App\Model\Coupans;
use DB;
use carbon\Carbon;
use Session;
use File;
use App\Model\ProductImage;
class CoupanController extends Controller
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
    public function coupanList(Request $request)
    {  
		$sort_by = $request->get('sort-by');
		$order_by = $request->get('order-by');
		$coupans = new Coupans();
        $homeTitle = 'Discounts and Offers'; 
        if(!empty($request->s)){
            $coupans = $coupans->where('code','like', '%'.$request->s.'%')->orwhere('discount','like', '%'.$request->s.'%'); 
        }
        if(!empty($request->status)){
			if($request->status==1){
			$coupans = $coupans->where('status',1);
			}
			else if ($request->status==2){
			$coupans = $coupans->where('status',0);
			}
		}   
		 //sorting based on status
        if($sort_by == 'status' && $order_by == 'desc'){
            $coupans->where('status', 1);
        }
        if($sort_by == 'status' && $order_by == 'asc'){
            $coupans->orderBy('status',0);
        } 
		$coupans =  $coupans->paginate(env('RECORD_PER_PAGE'));   
        $coupans->appends($request->s,$request->status);
		return view('admin.coupans.coupan-list',array('homeTitle'=>$homeTitle,'coupans'=>$coupans,'params'=>$request, 'sort_by'=> $sort_by , 'order_by' => $order_by))
			->with('i', ($request->input('page', 1) - 1) * env('RECORD_PER_PAGE'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddCoupanForm()
    {        
        $homeTitle ="Add Discount and Offers";
        
        return view('admin.coupans.add-coupan',array('homeTitle'=>$homeTitle));
    }
    /**
     * Auther	: Ajay kumar
     * method: To add the new coupan
     * Date	:09-07-2018
     * @return \Illuminate\Http\Response
     */
    public function AddCoupan(Request $request)
    {   
		
		$coupan = new Coupans();
         //when form submit
		if ($request->isMethod('post')) {
			DB::beginTransaction();
            try {
					
					$coupan->name = $request->name;
					$coupan->description = $request->description;
					$coupan->code = $request->code;
					$coupan->discount = $request->discount;
					$coupan->min_total = $request->minimum_order;
					$coupan->total = $request->total_discount;
					$coupan->type = $request->ctype;
					$coupan->date_start = date('Y-m-d', strtotime($request->startdate));
					$coupan->date_end = date('Y-m-d', strtotime($request->enddate));
					$coupan->uses_total = $request->uses_total;
					$coupan->uses_customer = $request->uses_per_customer;
					$coupan->status = $request->status;
					$image = $request->file('image');
					if($image){
						$input['imagename'] = rand(1,999).time().'.'.$image->getClientOriginalExtension();
						$categoryRootPath = public_path("/uploads/coupan/image");
						if(!File::exists($categoryRootPath)) {
							File::makeDirectory($categoryRootPath, 0777, true, true);                                
						}
						$image->move($categoryRootPath, $input['imagename']);
							$coupan->image = $input['imagename'];					
					}
					$coupan->save();
					DB::commit();
					
					 \Session::flash('alert-success','Coupan has been added successfully');                        
					return redirect()->route('admin.coupan-list');
                }
                catch (\Exception $e) {
					DB::rollBack();                    
                    return back()->withInput($request->input())->withErrors([$e->getMessage()]);
                }
		}    
		
        return view('admin.coupans.add-coupan',array('homeTitle'=>$homeTitle));
    }
    
/***********
***Author       : Ajay Kumar
***Action       : show
***Description  : This action is use to view the Coupan 
***Date         : 09-07-2018
***Params       : @coupan_id
***return       : @return \Illuminate\Http\Response
*************/  
     public function show($id){
        $coupan = Coupans::find($id);
		
        return view('admin.coupans.show', [
            'coupan' => $coupan
         ]);

    }
    
/***********
***Author       : Ajay Kumar
***Action       : show
***Description  : This action is use to edit the Coupan 
***Date         : 09-07-2018
***Params       : @coupan_id
***return       : @return \Illuminate\Http\Response
*************/  
     public function edit($id){
        $coupan = Coupans::find($id);
        return view('admin.coupans.edit-coupan', [
            'coupan' => $coupan
         ]);

    }
    
/***********
***Author       :Ajay Kumar
***Action       : show
***Description  : This action is use to update the Coupan 
***Date         : 09-07-2018
***Params       : @coupan_id
***return       : @return \Illuminate\Http\Response
*************/  
     public function update(Request $request){
		 
        $coupan = Coupans::find($request->coupan_id);        
          //when form submit
		if ($request->isMethod('post')) {
			DB::beginTransaction();
            try {
					$coupan->name = $request->name;
					$coupan->description = $request->description;
					$coupan->code = $request->code;
					$coupan->discount = $request->discount;
					$coupan->min_total = $request->minimum_order;
					$coupan->total = $request->total_discount;
					$coupan->type = $request->ctype;
					$coupan->date_start = date('Y-m-d', strtotime($request->startdate));
					$coupan->date_end = date('Y-m-d', strtotime($request->enddate));
					$coupan->uses_total = $request->uses_total;
					$coupan->uses_customer = $request->uses_per_customer;
					$coupan->status = $request->status;
					$image = $request->file('image');
					if($image){
						$input['imagename'] = rand(1,999).time().'.'.$image->getClientOriginalExtension();
						$categoryRootPath = public_path("/uploads/coupan/image");
						if(!File::exists($categoryRootPath)) {
							File::makeDirectory($categoryRootPath, 0777, true, true);                                
						}
						$image->move($categoryRootPath, $input['imagename']);
							$coupan->image = $input['imagename'];					
					}
					$coupan->save();
					DB::commit();
					\Session::flash('alert-success','Coupan has been updated successfully');                        
					return redirect()->route('admin.coupan-list');
                }
				catch (\Exception $e) {       
					DB::rollBack();                    
                    return back()->withInput($request->input())->withErrors([$e->getMessage()]);
                }
		}    
		
        return view('admin.coupans.add-coupan',array('homeTitle'=>$homeTitle));
    }
    
        

/***********
***Author       : Ajay Kumar
***Action       : destroy
***Description  : This action is use to view the coupan 
***Date         : 09-07-2018
***Params       : @customer_id
***return       : @return \Illuminate\Http\Response
*************/  
    
     public function destroy($id,Request $request){
		 
        $coupan = Coupans::find($id);        
        if($coupan)
			$coupan->delete();						
		\Session::flash('alert-success', 'Coupan deleted successfully');
        return redirect()->route("admin.coupan-list");               
        

    }
	 
}
