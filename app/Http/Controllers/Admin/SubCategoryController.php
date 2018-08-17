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
use App\Model\SubCategory;
use App\Model\States;
use App\Model\Events;

use App\Model\Blogs;
use DB;
use carbon\Carbon;

use File;

class SubCategoryController extends Controller
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
    public function subCategoryList(Request $request){
		
		$sort_by = $request->get('sort-by');
		$order_by = $request->get('order-by');
        $homeTitle = 'SubCategory List';
		$subcategories = DB::table('sb_sub_category as SC')
			->select('SC.name as SubCategoryName', 'SC.description as SubCategoryDescription', 'SC.image as subCategoryImage', 'SC.status as subCategoryStatus','SC.sub_category_id  as subCategoryID', 'C.name as categoryName')
			->join('sb_category as C', 'C.category_id', '=', 'SC.category_id');

        if(!empty($request->s)){
            $subcategories = $subcategories->where('C.name','like', '%'.$request->s.'%')->orWhere('SC.name', 'like', '%' . $request->s . '%');
 		
        }
        if(!empty($request->status)){
			if($request->status==1){
				$subcategories = $subcategories->where('SC.status',1);
			}
			else if ($request->status==2){
				$subcategories = $subcategories->where('SC.status',0);
			}
		}
        if($sort_by == 'status' && $order_by == 'desc'){
            $subcategories->where('status', 1);
        }
        if($sort_by == 'status' && $order_by == 'asc'){
            $subcategories->orderBy('status',0);
        } 
		$subcategories =  $subcategories->paginate(env('RECORD_PER_PAGE'));   
        $subcategories->appends($request->s,$request->status);
		
		return view('admin.categories.sub-category-list',array('homeTitle'=>$homeTitle,'subcategories'=>$subcategories,'params'=>$request, 'sort_by'=> $sort_by , 'order_by' => $order_by))
		->with('i', ($request->input('page', 1) - 1) * env('RECORD_PER_PAGE'));
		
        
    }
    
    	
	/***********
	***Author       : Ajay Kumar
	***Action       : AddSubCategoryForm
	***Description  : This action is use to show the category foerm
	***Date         : 09-07-2018
	***Params       : null
	***return       : @return \Illuminate\Http\Response
	*************/    	
	public function AddSubCategoryForm(Request $request){
		$homeTitle = 'Add Sub Category';
		$categories = Categories::all();
		return view('admin.categories.add-sub-category',array('homeTitle'=>$homeTitle,'categories'=>$categories)); 
	}
    
	/***********
	***Author       : Ajay Kumar
	***Action       : addSubCategory
	***Description  : This action is use to save the global subcategories for product
	***Date         : 09-07-2018
	***Params       : subcategories data
	***return       : @return \Illuminate\Http\Response
	*************/    	
	public function addSubCategory(Request $request){
		
		$homeTitle = 'Add Sub Category';
		$subcategories = new SubCategory();
		$subcategories->name = $request->name;
		$subcategories->status = $request->status;
		$subcategories->description = $request->description;
		$subcategories->category_id = $request->category;
		$image = $request->file('cat_images');
				if($image){
					
					$input['imagename'] = rand(1,999).time().'.'.$image->getClientOriginalExtension();
					$categoryRootPath = public_path("/uploads/subcategory/image");
					if(!File::exists($categoryRootPath)) {
						File::makeDirectory($categoryRootPath, 0777, true, true);                                
					}
					$image->move($categoryRootPath, $input['imagename']);
					
						$subcategories->image = $input['imagename'];					
				}
		$subcategories->save();
		
		$request->session()->flash('alert-success', 'Sub Category was successful added!');
				return redirect()->route("admin.sub-category-list");               
		
	}


	/***********
	***Author       : Ajay Kumar
	***Action       : editSubCategoryForm
	***Description  : This action is use to edit subcategories 
	***Date         : 09-07-2018
	***Params       : @category_id
	***return       : @return \Illuminate\Http\Response
	*************/  
		
	public function editSubCategoryForm($id){
		
		$homeTitle = 'Edit Sub Category';
		$categories = Categories::all();
		$subcategories = SubCategory::find(base64_decode($id)); 
		
		return view('admin.categories.edit-sub-category',array('homeTitle'=>$homeTitle,'categories'=>$categories,'subcategories'=>$subcategories));        
	}
    
	/***********
	***Author       : Ajay Kumar
	***Action       : updateSubCategory
	***Description  : This action is use to save the global category for product
	***Date         : 09-07-2018
	***Params       : category data
	***return       : @return \Illuminate\Http\Response
	*************/    	
	public function updateSubCategory(Request $request){
		$homeTitle = 'Update Sub Category';
		$subcategories = SubCategory::find($request->categoryId);
		$subcategories->name = $request->name;
		$subcategories->description = $request->description;
		$subcategories->category_id = $request->category;
		$subcategories->status = $request->status;
		$image = $request->file('cat_images');
				if($image){
					$input['imagename'] = rand(1,999).time().'.'.$image->getClientOriginalExtension();
					$categoryRootPath = public_path("/uploads/subcategory/image");
					if(!File::exists($categoryRootPath)) {
						File::makeDirectory($categoryRootPath, 0777, true, true);                                
					}
					if(!File::exists($categoryRootPath.$subcategories->image)) {
						File::delete($categoryRootPath.$subcategories->image);                                
					}
					$image->move($categoryRootPath, $input['imagename']);
					
						$subcategories->image = $input['imagename'];					
				}
		$subcategories->save();
		$request->session()->flash('alert-success', 'Sub Category was successful updated!');
				return redirect()->route("admin.sub-category-list");               
		
	}
    
	/***********
	***Author       : Ajay Kumar
	***Action       : destroySubCategory
	***Description  : This action is use to delete category 
	***Date         : 09-07-2018
	***Params       : @category_id
	***return       : @return \Illuminate\Http\Response
	*************/  
		
		public function destroySubCategory($id,Request $request){
			
			$subcategories = SubCategory::find(base64_decode($id));        
			if($subcategories)
				$subcategories->delete();	
								
			\Session::flash('alert-success', 'Sub Category deleted successfully');
			return redirect()->route("admin.sub-category-list");               
			

		}
	}

	