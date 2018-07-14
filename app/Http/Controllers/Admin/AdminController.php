<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;  
use App\User;
use App\Model\Admin;
use App\Model\Orders;
use App\Model\Products;
use App\Model\Coupans;
use App\Model\Settings;
use App\Model\Countries;
use App\Model\States;
use File;
use App\Model\Blogs;
use DB;
use carbon\Carbon;
use App\Model\ProductImage;
class AdminController extends Controller
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
        $customers = User::orderBy('id','desc')->limit(5)->get();
        //$orders= Orders::orderBy('order_id','desc')->limit(5)->get();
        $coupans= Coupans::orderBy('coupon_id','desc')->limit(5)->get();
        $products= Products::orderBy('product_id','desc')->limit(5)->get();
		$orders = DB::table('sb_order')
			->select('sb_order.*','sb_order.created_at as orderDate','users.*',
				'users.name as userName')
			->leftJoin('users', 'users.id', '=', 'sb_order.user_id')->orderBy('order_id','desc')->limit(5)->get(); 
		
        return view('admin.home',array('homeTitle'=>$homeTitle,'data'=>$Arr,'customers'=>$customers,'orders'=>$orders,'coupans'=>$coupans,'products'=>$products,'totalOrders'=>Orders::all()->count(),'totalProducts'=>Products::all()->count(),'totalUser'=>User::all()->count()));
    }

	/**
     * Show the application admin profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request){            
         $homeTitle = 'Profile';  
		 $admin = Admin::find(Auth::user());			
	   return view('admin.profile',array('homeTitle'=>$homeTitle,'admin'=>$admin));        
    }
	/**
     * Show the application admin profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request){
		//dd($request->all());
	
        $homeTitle = 'Profile';  
		$admin = Admin::find(Auth::user()->id);
		
        $title = 'Profile';
		//$request = new Request();
		$method = $request->method();
		
		if ($request->isMethod('post'))
		{
			
			$data =Input::all();
			//dd($data);
			$input = $request->all();
			//dd($input);			
			$rules = array(
				'fname' => 'Required|Min:3|Max:250',
				'lname' => 'Required|Min:3|Max:250',
				//'email'     => 'required|email|unique:sb_admin'
				
			);
			$validator = Validator::make($data, $rules);
			if ($validator->fails())
			{				
				return redirect()->back()->withErrors($validator)->withInput($input);
			
			}
			else
			{	
				$admin->fname = $data['fname'];
				$admin->lname = $data['lname'];
				$admin->email = $data['email'];
				$admin->telephone = $data['telephone'];					
				/**
				 * organization logo upload here
				 * **/
				$image = $request->file('images');
				if($image){
					$input['imagename'] = strtolower($request->fname).time().'.'.$image->getClientOriginalExtension();
					$adminRootPath = public_path("/uploads/admin/profile/image");					
					if(!File::exists($adminRootPath)) {
						File::makeDirectory($adminRootPath, 0777, true, true);                                
					}
					$image->move($adminRootPath, $input['imagename']);
					//$Orgn = Orgnisation::where('id',$Orgnisation->id)->update(
						//	 array('logo'=>$input['imagename']));
						$admin->profile_picture = $input['imagename'];					
				}
				$admin->save();
				$request->session()->flash('alert-success', 'Profile Updated successfully!');
			
			    return redirect()->back();
				
			}
		}
			
	   return view('admin.profile',array('homeTitle'=>$homeTitle,'admin'=>$admin));        
    }
  
	/**
     * Show the application admin change password.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePasswordForm(Request $request){            
         $homeTitle = "SmartBuy | Update password";
		 $admin = Admin::find(Auth::user());

	   return view('admin.update-password',array('homeTitle'=>$homeTitle,'admin'=>$admin));        
    }
	
	/***********
    ***Author       : Ajay Kumar
    ***Action       : savePassword
    ***Description  : This action is used for update the reset password
    ***Date         : 12-07-2018
    ***Params       : null
    ***return       : @return \Illuminate\Http\Response
    *************/
    public function savePassword(Request $request){
        $homeTitle = "Raascals | Update password";
        $admin = Auth::user();        
        if(Hash::check($request->current_password, $admin->password)){		
			
			   $validation = Validator::make($request->all(), [            
					'password'  => 'required|confirmed',            
				]);
				
				if ($validation->fails()) { 
					return redirect()->back()->withErrors($validation);   
				} 
				
			 if($admin){			 
					$newPass = Admin::find($admin->id);
					$newPass->password = Hash::make($request->password);				
					$newPass->save();
				\Session::flash('success','Your password has been updated successfully');
				 return redirect()->route('change-password');
			 }else{
				return redirect()->back()->withErrors('success','Password not updated');
			}
			
		}else{
				return redirect()->back()->withErrors('Current password does not match');   
		}
	}
     
}
