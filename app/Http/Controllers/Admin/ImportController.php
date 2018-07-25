<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests;
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
use App\Model\Events;
use App\Model\Categories;

use App\Model\Wishlists;
use App\Model\Blogs;
use DB;
use carbon\Carbon;
use App\Model\ProductImage;
use File;

class ImportController extends Controller
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

  

/***********
***Author       : Ajay Kumar
***Action       : ImportProductForm
***Description  : This action is use to show the product form
***Date         : 04-07-2018
***Params       : param
***return       : @return \Illuminate\Http\Response
*************/  
    public function importProduct(Request $request){
        $homeTitle = 'Import Product';
        
        return view('admin.products.import-product',array('homeTitle'=>$homeTitle)); 
    }
    
/***********
***Author       : Ajay Kumar
***Action       : ImportProduct
***Description  : This action is use to save the global product
***Date         : 05-07-2018
***Params       : category data
***return       : @return \Illuminate\Http\Response
*************/  
	
     public function importProductProcess(Request $request){
		$validation = Validator::make($request->all(), [            
            'file'   => 'required',
                
        ]);
		$flag=true;
		if ($validation->fails()){ 
            return redirect()->back()->withErrors($validation)->withInput($request->all()); 
        }
		
			if($request->hasFile('file')){
				\Excel::load($request->file('file')->getRealPath(), function ($reader) {
					foreach ($reader->toArray() as $key => $row) {
						
						for($i = 0;$i<count($row);$i++){
							$data['category_id'] = $row[$i]['category_id'];
							$data['name'] = $row[$i]['name'];
							$data['model'] = $row[$i]['model'];
							$data['sku'] = $row[$i]['sku'];
							$data['quantity'] = $row[$i]['quantity'];
							$data['image'] = $row[$i]['image'];
							$data['price'] = $row[$i]['price'];
							$data['size'] = $row[$i]['size'];
							$data['color'] = $row[$i]['color'];
							$data['points'] = $row[$i]['points'];
							$data['weight'] = $row[$i]['weight'];
						
							if(!empty($data)){
								$insertData = DB::table('sb_product')->insert($data);
								if ($insertData) {
									$flag=true;
									
								}else {  
									$flag=false;
									
								}
							}
						}
					}
					if($flag){
						return redirect()->back()->withsuccess('Product added successfully.');
					}else{
						return redirect()->back()->witherror('Oops something went wrong.');
					}
				});
			}
			return back();
			
		}                                                                          
 
		
 
 
 
 
 
	
	
	}
