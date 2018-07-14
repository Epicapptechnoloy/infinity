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

use App\Model\Blogs;
use DB;
use carbon\Carbon;

use File;

class CategoryController extends Controller
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
    public function categoryList(Request $request){
		
		$sort_by = $request->get('sort-by');
		$order_by = $request->get('order-by');
		$categories = new Categories();
        $homeTitle = 'Category and List'; 
        if(!empty($request->s)){
            $categories = $categories->where('name','like', '%'.$request->s.'%'); 
        }
        if(!empty($request->status)){
			if($request->status==1){
			$categories = $categories->where('status',1);
			}
			else if ($request->status==2){
			$categories = $categories->where('status',0);
			}
		}   
		 //sorting based on status
        if($sort_by == 'status' && $order_by == 'desc'){
            $categories->where('status', 1);
        }
        if($sort_by == 'status' && $order_by == 'asc'){
            $categories->orderBy('status',0);
        } 
		$categories =  $categories->paginate(env('RECORD_PER_PAGE'));   
        $categories->appends($request->s,$request->status);
		
		return view('admin.categories.category-list',array('homeTitle'=>$homeTitle,'categories'=>$categories,'params'=>$request, 'sort_by'=> $sort_by , 'order_by' => $order_by))
			->with('i', ($request->input('page', 1) - 1) * env('RECORD_PER_PAGE'));
		
        
    }
    
    	
/***********
***Author       : Ajay Kumar
***Action       : AddCategoryForm
***Description  : This action is use to show the category foerm
***Date         : 09-07-2018
***Params       : null
***return       : @return \Illuminate\Http\Response
*************/    	
     public function AddCategoryForm(Request $request){
        $homeTitle = 'Add Category';
        $categories = Categories::all();
        return view('admin.categories.add-category',array('homeTitle'=>$homeTitle,'categories'=>$categories)); 
    }
    
/***********
***Author       : Ajay Kumar
***Action       : AddCategoryForm
***Description  : This action is use to save the global category for product
***Date         : 09-07-2018
***Params       : category data
***return       : @return \Illuminate\Http\Response
*************/    	
     public function Addcategory(Request $request){
		//dd($request->all());
        $homeTitle = 'Add Category';
        $categories = new Categories();
        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->parent_id = $request->category;
        $image = $request->file('cat_images');
				if($image){
					
					$input['imagename'] = rand(1,999).time().'.'.$image->getClientOriginalExtension();
					$categoryRootPath = public_path("/assets/upload/images/category");					
					if(!File::exists($categoryRootPath)) {
						File::makeDirectory($categoryRootPath, 0777, true, true);                                
					}
					$image->move($categoryRootPath, $input['imagename']);
					//$Orgn = Orgnisation::where('id',$Orgnisation->id)->update(
						//	 array('logo'=>$input['imagename']));
						$categories->image = $input['imagename'];					
				}
        $categories->save();
		
        $request->session()->flash('alert-success', 'Category was successful added!');
                return redirect()->route("admin.category-list");               
        
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
		
		  $homeTitle = 'Edit Category';
        $category = Categories::find(base64_decode($id)); 
		
        $categories = Categories::all();
        return view('admin.categories.edit',array('homeTitle'=>$homeTitle,'categories'=>$categories,'category'=>$category));        
    }
    
/***********
***Author       : Ajay Kumar
***Action       : AddCategoryForm
***Description  : This action is use to save the global category for product
***Date         : 09-07-2018
***Params       : category data
***return       : @return \Illuminate\Http\Response
*************/    	
     public function update(Request $request){
        $homeTitle = 'Add Category';
        $categories = Categories::find($request->categoryId);
        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->parent_id = $request->category;
        $categories->status = $request->status;
        $image = $request->file('cat_images');
				if($image){
					$input['imagename'] = rand(1,999).time().'.'.$image->getClientOriginalExtension();
					$categoryRootPath = public_path("/assets/upload/images/category");					
					if(!File::exists($categoryRootPath)) {
						File::makeDirectory($categoryRootPath, 0777, true, true);                                
					}
					if(!File::exists($categoryRootPath.$categories->image)) {
						File::delete($categoryRootPath.$categories->image);                                
					}
					$image->move($categoryRootPath, $input['imagename']);
					//$Orgn = Orgnisation::where('id',$Orgnisation->id)->update(
						//	 array('logo'=>$input['imagename']));
						$categories->image = $input['imagename'];					
				}
        $categories->save();
        $request->session()->flash('alert-success', 'Category was successful updated!');
                return redirect()->route("admin.category-list");               
        
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
        $category = Categories::find(base64_decode($id));        
        if($category)
			$category->delete();	
							
		\Session::flash('alert-success', 'Category deleted successfully');
        return redirect()->route("admin.category-list");               
        

    }
}
