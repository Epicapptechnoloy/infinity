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

class ColorController extends Controller
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
	 
	 
	/***********
	***Author       : Ajay Kumar
	***Action       : AddColor
	***Description  : This action is use to add color 
	***Date         : 11-08-2018
	***Params       : @color,
	***return       : @return \Illuminate\Http\Response
	*************/ 
	
    public function AddColor(Request $request){
        $homeTitle = 'Add Color';
        return view('admin.color.add-color',array('homeTitle'=>$homeTitle)); 
    }
	
	
	
	/***********
	***Author       : Ajay Kumar
	***Action       : AddColorPost
	***Description  : This action is use to add size 
	***Date         : 11-08-2018
	***Params       : @color_name,color_code
	***return       : @return \Illuminate\Http\Response
	*************/ 
	
	public function AddColorPost(Request $request){
		
        $validation = Validator::make($request->all(), [            
            'color_name'   => 'required',
            'color_code'   => 'required',
            'status'       => 'required',      
        ]);
        if ($validation->fails()) { 
            return redirect()->back()->withErrors($validation)->withInput($request->all());   
        }else{
			try {
				
				DB::beginTransaction(); 
				$Colors = new ProductColors();
				$Colors->color_name = $request->color_name;        
				$Colors->color_code = $request->color_code;        
				$Colors->status = $request->status;
				$Colors->save();				
				DB::commit();
				$request->session()->flash('alert-success', 'Color was successful added!');
				return redirect()->route("colorList");
			}catch(\Illuminate\Database\QueryException $e){
                DB::rollBack();
                return redirect()->back()->withErrors(['Oops ! some thing is wrong.'])->withInput($request->all());
            } 
		}
	} 
	
	
	/***********
	***Author       : Ajay Kumar
	***Action       : ColorList
	***Description  : This action is use to Color List 
	***Date         : 11-08-2018
	***Params       : @color_id,
	***return       : @return \Illuminate\Http\Response
	*************/ 
	
	public function ColorList(Request $request) {
        $homeTitle = 'Color list'; 
		$sort_by = $request->get('sort-by');
        $order_by = $request->get('order-by');
		$Colors =   ProductColors::all(); 
        return view('admin.color.color-list',array('homeTitle'=>$homeTitle,'Colors'=>$Colors,'totalColor'=>ProductColors::all()->count()))
        ->with('i', ($request->input('page', 1) - 1) * env('RECORD_PER_PAGE'));
    }
	
	
	/***********
	***Author       : Ajay Kumar
	***Action       : editColor
	***Description  : This action is use to edit Color
	***Date         : 11-08-2018
	***Params       : @color_id,
	***return       : @return \Illuminate\Http\Response
	*************/ 
	
	public function editColor(Request $request){
		$homeTitle = 'Edit Color';
		$Colors = ProductColors::where('color_id',base64_decode($request->color_id))->first();
        return view('admin.color.edit-color',array('homeTitle'=>$homeTitle,'Colors'=>$Colors)); 
    }
	
	
	/***********
	***Author       : Ajay Kumar
	***Action       : editColorPost
	***Description  : This action is use to add size 
	***Date         : 11-08-2018
	***Params       : @color_name,color_code
	***return       : @return \Illuminate\Http\Response
	*************/ 
	
	public function editColorPost(Request $request){
		$validation = Validator::make($request->all(), [            
            'color_name'   => 'required',
            'color_code'   => 'required',
            'status'       => 'required',               
        ]);
		if ($validation->fails()) { 
            return redirect()->back()->withErrors($validation)->withInput($request->all()); 
        }
		try{
			DB::beginTransaction();
			$Colors = ProductColors::where('color_id',$request->colorId)->first();
			$Colors->color_name = $request->color_name;
			$Colors->color_code = $request->color_code;
			$Colors->status = $request->status;
			$Colors->update();
			DB::commit();
			$request->session()->flash('alert-success', 'Color Updated successfully!');
			return redirect()->route("colorList");
		}catch(\Illuminate\Database\QueryException $e){
			DB::rollBack();
			return redirect()->back()->withErrors(['Oops ! some thing is wrong.'])->withInput($request->all());
		} 
    }
	
	/***********
	***Author       : Ajay Kumar
	***Action       : deleteColor
	***Description  : This action is use to delete color 
	***Date         : 11-08-2018
	***Params       : @id,
	***return       : @return \Illuminate\Http\Response
	*************/ 
    public function deleteColor($id,Request $request){
        $color = ProductColors::find(base64_decode($id));        
        if($color)
			$color->delete();	
		\Session::flash('alert-success', 'Color deleted successfully');
        return redirect()->route("colorList");               
        

    }
}
