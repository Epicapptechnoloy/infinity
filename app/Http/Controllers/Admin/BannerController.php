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

use App\Model\Blogs;
use DB;
use carbon\Carbon;

use File;

class BannerController extends Controller
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
    public function bannerList(Request $request){
		
		$sort_by = $request->get('sort-by');
		$order_by = $request->get('order-by');
		  $homeTitle = 'Banner List';
		$banner=Banners::all();
		
		return view('admin.banner.banner_list',array('homeTitle'=>$homeTitle,'banner'=>$banner,'params'=>$request, 'sort_by'=> $sort_by , 'order_by' => $order_by))
		->with('i', ($request->input('page', 1) - 1) * env('RECORD_PER_PAGE'));
		
    }
    
    	
	/***********
	***Author       : Ajay Kumar
	***Action       : AddBannerForm
	***Description  : This action is use to show the category foerm
	***Date         : 09-07-2018
	***Params       : null
	***return       : @return \Illuminate\Http\Response
	*************/    	
     public function AddBannerForm(Request $request){
        $homeTitle = 'Add Banner';
        $banner = Banners::all();
        return view('admin.banner.add-banner',array('homeTitle'=>$homeTitle,'banner'=>$banner)); 
    }
    
	
	
	
	/***********
	***Author       : Ajay Kumar
	***Action       : AddBannerForm
	***Description  : This action is use to save the global category for product
	***Date         : 09-07-2018
	***Params       : category data
	***return       : @return \Illuminate\Http\Response
	*************/    	
     public function Addbanner(Request $request){
		
        $homeTitle = 'Add Banner';
        $banner = new Banners();
        $banner->bannerName = $request->bannerName;
        $banner->bannerText = $request->bannerText;
        $banner->status = $request->status;
        $image = $request->file('bannerImage');
				if($image){
					
					$input['imagename'] = rand(1,999).time().'.'.$image->getClientOriginalExtension();
					$categoryRootPath = public_path("/uploads/banner/image");					
					if(!File::exists($categoryRootPath)) {
						File::makeDirectory($categoryRootPath, 0777, true, true);                                
					}
					$image->move($categoryRootPath, $input['imagename']);
					
						$banner->bannerImage = $input['imagename'];					
				}
        $banner->save();
		
        $request->session()->flash('alert-success', 'Banner was successful added!');
                return redirect()->route("admin.banner-list");               
        
    }


	/***********
	***Author       : Ajay Kumar
	***Action       : edit
	***Description  : This action is use to edit category 
	***Date         : 09-07-2018
	***Params       : @category_id
	***return       : @return \Illuminate\Http\Response
	*************/  
    
     public function edit($id){
		
		$homeTitle = 'Edit Banner';
        $banner = Banners::find(base64_decode($id)); 
		
        return view('admin.banner.edit-banner',array('homeTitle'=>$homeTitle,'banner'=>$banner));        
    }
    
	/***********
	***Author       : Ajay Kumar
	***Action       : AddBannerForm
	***Description  : This action is use to save the global category for product
	***Date         : 09-07-2018
	***Params       : category data
	***return       : @return \Illuminate\Http\Response
	*************/  


  	
    public function update(Request $request){
        $homeTitle = 'Edit Banner';
        $banner = Banners::find($request->bannerId);
        $banner->bannerName = $request->bannerName;
        $banner->bannerText = $request->bannerText;
        
        $banner->status = $request->status;
        $image = $request->file('bannerImage');
				if($image){
					$input['imagename'] = rand(1,999).time().'.'.$image->getClientOriginalExtension();
					$categoryRootPath = public_path("/uploads/banner/image");					
					if(!File::exists($categoryRootPath)) {
						File::makeDirectory($categoryRootPath, 0777, true, true);                                
					}
					if(!File::exists($categoryRootPath.$banner->image)) {
						File::delete($categoryRootPath.$banner->image);                                
					}
					$image->move($categoryRootPath, $input['imagename']);
					
						$banner->bannerImage = $input['imagename'];					
				}
        $banner->save();
		
        $request->session()->flash('alert-success', 'Banner was successful updated!');
                return redirect()->route("admin.banner-list");               
        
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
        $banner = Banners::find(base64_decode($id));        
        if($banner)
			$banner->delete();	
							
		\Session::flash('alert-success', 'Banner deleted successfully');
        return redirect()->route("admin.banner-list");               
        

    }
}
