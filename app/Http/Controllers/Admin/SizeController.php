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
use App\Model\Categories;
use App\Model\Products;
use App\Model\Settings;
use App\Model\Countries;
use App\Model\States;
use App\Model\Events;
use App\Model\Banners;
use App\Model\ProductColors;
use App\Model\ProductSizes;
use App\Model\Blogs;
use DB;
use carbon\Carbon;
use File;

class SizeController extends Controller
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
	public function AddSize(Request $request){
        $homeTitle = 'Add Size';
        return view('admin.size.add-size',array('homeTitle'=>$homeTitle)); 
    }
	
	
	/***********
	***Author       : Ajay Kumar
	***Action       : AddSizePost
	***Description  : This action is use to add size 
	***Date         : 09-07-2018
	***Params       : @size_name,
	***return       : @return \Illuminate\Http\Response
	*************/ 
	
	public function AddSizePost(Request $request){
		
        $validation = Validator::make($request->all(), [            
            'size_name'   => 'required',
            'status'       => 'required',      
        ]);
        if ($validation->fails()) { 
            return redirect()->back()->withErrors($validation)->withInput($request->all());   
        }else{
			try {
				DB::beginTransaction(); 
				$Sizes = new ProductSizes();
				$Sizes->size_name = $request->size_name;        
				$Sizes->status = $request->status;
				$Sizes->save();				
				DB::commit();
				$request->session()->flash('alert-success', 'Size was successful added!');
				return redirect()->route("sizeList");
			}catch(\Illuminate\Database\QueryException $e){
                DB::rollBack();
                return redirect()->back()->withErrors(['Oops ! some thing is wrong.'])->withInput($request->all());
            } 
		}
	} 
	
	
	/***********
	***Author       : Ajay Kumar
	***Action       : SizeList
	***Description  : This action is use to  size list
	***Date         : 09-07-2018
	***Params       : @size_id
	***return       : @return \Illuminate\Http\Response
	*************/ 
	
	public function SizeList(Request $request) {
        $homeTitle = 'Size list'; 
		$sort_by = $request->get('sort-by');
        $order_by = $request->get('order-by');
		$Sizes =   ProductSizes::all(); 
        return view('admin.size.size-list',array('homeTitle'=>$homeTitle,'Sizes'=>$Sizes,'totalSize'=>ProductSizes::all()->count()))
        ->with('i', ($request->input('page', 1) - 1) * env('RECORD_PER_PAGE'));
    }

	/***********
	***Author       : Ajay Kumar
	***Action       : editSize
	***Description  : This action is use to edit size form
	***Date         : 09-07-2018
	***Params       : @size_id
	***return       : @return \Illuminate\Http\Response
	*************/ 
	
	public function editSize(Request $request){
		$homeTitle = 'Edit Size';
		$Sizes = ProductSizes::where('size_id',base64_decode($request->size_id))->first();
        return view('admin.size.edit-size',array('homeTitle'=>$homeTitle,'Sizes'=>$Sizes)); 
    }
	
	/***********
	***Author       : Ajay Kumar
	***Action       : editSizePost
	***Description  : This action is use to edit size 
	***Date         : 09-07-2018
	***Params       : @size_id
	***return       : @return \Illuminate\Http\Response
	*************/ 
	
	public function editSizePost(Request $request){
		
		$validation = Validator::make($request->all(), [            
            'size_name'   => 'required',
            'status'       => 'required',               
        ]);
		if ($validation->fails()) { 
            return redirect()->back()->withErrors($validation)->withInput($request->all()); 
        }
		try{
			DB::beginTransaction();
			$Sizes = ProductSizes::where('size_id',$request->sizeId)->first();
			$Sizes->size_name = $request->size_name;
			
			$Sizes->status = $request->status;
			
			$Sizes->update();
			DB::commit();
			
			$request->session()->flash('alert-success', 'Size Updated successfully!');
			return redirect()->route("sizeList");
		}catch(\Illuminate\Database\QueryException $e){
			DB::rollBack();
			return redirect()->back()->withErrors(['Oops ! some thing is wrong.'])->withInput($request->all());
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
		
    public function deleteSize($id,Request $request){
        $Sizes = ProductSizes::find(base64_decode($id));        
        if($Sizes)
			$Sizes->delete();	
							
		\Session::flash('alert-success', 'Size deleted successfully');
        return redirect()->route("sizeList");               
        

    }
}
