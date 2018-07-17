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
use App\Model\Review;
use App\Model\Blogs;
use DB;
use carbon\Carbon;
use File;

class ReviewController extends Controller
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
    public function index(Request $request){
        $Arr = array();
		$homeTitle = 'ProductReview'; 
		$productRating =   Products::all();
		
		$productReview =   Products::all();
		
		$rating=array();
		foreach($productRating as $p_rating =>$value){
			
			$pid=$value['product_id'];

			$rating[$pid] = DB::table('sb_review')
                ->where('product_id', $pid)
                ->avg('rating');
		}
		
		 foreach($rating As $key =>$value){
			if(is_null($value)){
				$rating[$key]= "No Rating";
			}
		} 
		
		return view('admin.review.review_list',array('homeTitle'=>$homeTitle,'rating'=>$rating,'productReview'=>$productReview))
			->with('i', ($request->input('page', 1) - 1) * env('RECORD_PER_PAGE'));
		
		
    }
	
    
	public function viewReview(Request $request){
		
		$id=base64_decode($request->id);
		$homeTitle = 'View Review';
		$sort_by = $request->get('sort-by');
        $order_by = $request->get('order-by');
		$userdetails=User::find($id);
		$productName=Products::find($id);
		
		$Review = DB::table('sb_review AS PR')
			->select('PR.*','P.*','P.name as ProductName','UT.*',
			'UT.name as UserName')
			->leftJoin('users AS UT', 'UT.id', '=', 'PR.user_id') 
			->leftJoin('sb_product AS P', 'P.product_id', '=', 'PR.product_id')->where('PR.product_id',base64_decode($request->id))->get();; 
			
		$rating=0;
		$arraycount=count($Review);
		
		foreach($Review as $key=>$value){
			
			$rating+=$value->rating;
		}
		
		$avg=($rating == 0 ? 0 : ($rating/$arraycount));
		
        return view('admin.review.view-review',array('homeTitle'=>$homeTitle,'productName'=>$productName,'productreviewId'=>$request->id,'Review'=>$Review,'avg'=>$avg))->with('i', ($request->input('page', 1) - 1) * env('RECORD_PER_PAGE'));
    }
	
	
	
    	
	/***********
	***Author       : Ajay Kumar
	***Action       : AddReviewForm
	***Description  : This action is use to show the category foerm
	***Date         : 07-07-2018
	***Params       : null
	***return       : @return \Illuminate\Http\Response
	*************/    
	
		 public function AddReviewForm(Request $request){
			$homeTitle = 'Add Review';
			$product = Products::all();
			return view('admin.review.add-review',array('homeTitle'=>$homeTitle,'product'=>$product)); 
		}
    
	
	/***********
	***Author       : Ajay Kumar
	***Action       : AddCategoryForm
	***Description  : This action is use to save the global category for product
	***Date         : 05-12-2017
	***Params       : category data
	***return       : @return \Illuminate\Http\Response
	*************/    
	
		public function Addreview(Request $request){
			$validation = Validator::make($request->all(), [            
				'rating'   => 'required',
				'comments'       => 'required',      
			]);
			if ($validation->fails()) { 
				return redirect()->back()->withErrors($validation)->withInput($request->all());   
			}else{
				try {				
					DB::beginTransaction(); 
					$Review = new Review();
					$Review->rating = $request->rating;        
					$Review->comments = $request->comments;
					$Review->product_id = $request->product;
					$Review->user_id = \Auth::guard('admin')->user()->id;
					
					$Review->save();				
					DB::commit();
				
					$request->session()->flash('alert-success', 'Review was successful added!');
					return redirect()->route("admin.review-list");
				}catch(\Illuminate\Database\QueryException $e){
					DB::rollBack();
					return redirect()->back()->withErrors(['Oops ! some thing is wrong.'])->withInput($request->all());
				} 
			}
		} 


		public function editReviewDetails(Request $request){
			$productreviewId=$request->productreviewId;
			$homeTitle = 'Edit Review';
			$productReview = Review::where('review_id',base64_decode($request->id))->first();
			return view('admin.review.edit-review',array('homeTitle'=>$homeTitle,'productreviewId'=>$productreviewId,'productReview'=>$productReview)); 
		}
	
		public function editReviewPost(Request $request){
			
			$validation = Validator::make($request->all(), [            
				'comments'   => 'required',
			]);
			if ($validation->fails()) { 
				return redirect()->back()->withErrors($validation)->withInput($request->all()); 
			}
			try{
				DB::beginTransaction();
				$ProductReview = Review::where('review_id',$request->reviewId)->first();
				$ProductReview->rating = $request->rating;
				$ProductReview->comments = $request->comments;
				$ProductReview->update();
				DB::commit(); 
				$request->session()->flash('alert-success', 'Review Updated successfully!');
				return redirect()->route("admin.view.review",['id' =>$request->productreviewId]);
			}catch(\Illuminate\Database\QueryException $e){
				DB::rollBack();
				return redirect()->back()->withErrors(['Oops ! some thing is wrong.'])->withInput($request->all());
			} 
		}
	
		/***********
		***Author       : Ajay Kumar
		***Action       : deleteReview
		***Description  : This action is use to delete category 
		***Date         : 07-01-2018
		***Params       : @review_id
		***return       : @return \Illuminate\Http\Response
		*************/  
	
		public function deleteReview(Request $request,$id){
			
			$ProductReview = Review::where('review_id',base64_decode($id))->delete(); 
			$request->session()->flash('alert-success', 'Record has been  deleted successfully!');
			return redirect()->back();
		}


     


	/***********
	***Author       : Ajay Kumar
	***Action       : edit
	***Description  : This action is use to edit category 
	***Date         : 12-07-2018
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
	***Date         : 05-12-2017
	***Params       : category data
	***return       : @return \Illuminate\Http\Response
	*************/    	
    public function update(Request $request){
        $homeTitle = 'Add Category';
        $categories = Categories::find($request->categoryId);
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
					if(!File::exists($categoryRootPath.$categories->image)) {
						File::delete($categoryRootPath.$categories->image);                                
					}
					$image->move($categoryRootPath, $input['imagename']);
					
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
	***Date         : 07-01-2018
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
