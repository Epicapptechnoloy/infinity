<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Hash;
use Session;
use App\Model\Cms;
class CmsController extends Controller
{
    const STATUS = 1; // 1=active , 2= inactive
	/***********
	***Author       : Ajay kumar
	***Action       : Add CMS Page
	***Description  : This action is used to add-cms
	***Date         : 13-07-2018
	***Params       : null
	***return       : null
	*************/ 
	public function addcms(Request $request){
		
		return view('admin.cms.add-cms');		
	}
	
	/***********
	***Author       : Ajay kumar
	***Action       : add-cms-process
	***Description  : validate form and save in db
	***Date         :  13-07-2018
	***Params       : request
	***return       : void(0) 
	*************/    
    public function addcmsprocess(Request $request){
        $this->validate($request, [
            'title'      => 'required|string'           
        ]);
         DB::beginTransaction();
         try {
                        $cms 				= new cms();
                        $cms->title      	= $request->title;
                        $cms->description   = $request->description;
                        $cms->save();
                       
                        \Session::flash('alert-success','Page has been created successfully.');                        
                        DB::commit();
                        return redirect()->route('manage-cms-page');
                }
                catch (\Exception $e) {
                    DB::rollBack();
                    return back()->withInput($request->input())->withErrors([$e->getMessage()]);    
                }
       }
       
    /***********
	***Author       : Ajay kumar
	***Action       : edit-cms-process
	***Description  : validate form and save in db
	***Date         : 13-07-2018
	***Params       : request
	***return       : void(0) 
	*************/    
    public function editcmspage(Request $request){
	  $cms = Cms::where('id',base64_decode($request->id))->first();
	  //dd($cms);
      return view('admin.cms.edit-cms-page',
                  array(
                        'params'=>$request,
                        'cms'=>$cms
                        )         
				);
       }

      
      public function editcmsPost(Request $request){
		  $this->validate($request, [                        
            "title"             => "required"           
      ]);
       DB::beginTransaction();
       try {
                        $Cms = Cms::where('id',$request->cms_id)->first();                     
                        $Cms->title          = $request->title;
                        $Cms->description     = $request->description;
                        $Cms->save();
                        \Session::flash('alert-success','Content has been updated successfully.');                        
                       
                        DB::commit();
                        return redirect()->route('manage-cms-page',[base64_encode($Cms->id)]);
                }
                catch (\Exception $e) {
                    DB::rollBack();
                    return back()->withInput($request->input())->withErrors([$e->getMessage()]);
                        
                }
       
       
        
       }
       
	/***********
	***Author       : Ajay kumar
	***Action       : CMS Pages list
	***Description  : This action is used to listing of CMS pages
	***Date         :  13-07-2018
	*************/
	public function managecms(Request $request){		
	   $Column = 'created_at';
       $orderBy = 'DESC';
    if($request->get('sort_by'))
        $Column = $request->get('sort_by');
    if($request->get('order_by'))
        $orderBy = $request->get('order_by');
		
		$cms = Cms::orderBy($Column,$orderBy);
		
		return view('admin.cms.managecms',
					array(
						'params'=>$request,
						'records'=>$cms->paginate(env("RECORD_PER_PAGE")),
						)
					);
		}
		
	/***********
	***Author       : Ajay kumar
	***Action       : CMS Delete Pages
	***Description  : This action is used to delete of CMS pages
	***Date         :  13-07-2018
	*************/
	public function deletecmspage(Request $request){
		
		if($request->did){
			DB::beginTransaction();
			try {
				$cms = Cms::where('id',$request->did)->first();
				$cms->delete();
				DB::commit();    
				return redirect(route('manage-cms-page'));
				}catch (\Exception $e){
					DB::rollBack();
					return back()->withError([$e->getMessage()]);
				}
			
		}
	}
    
	/***********
	***Author       : Ajay kumar
	***Action       : UpdateCmsStatus
	***Description  : This action is used to change the status of cms pages
	***Date         :  13-07-2018
	*************/   
    public function UpdateCmsStatus(Request $request){
		if($request->cms_id){
           DB::beginTransaction();
            try {
                $Cms  = Cms::where('id',$request->cms_id)->first();
                $Cms->status = $request->cmsStat;
                $Cms->save();
                $data =  array (
                  'status' => 1,
                  'error' => 0,
                  'msg'   => 'Action performed Successfully.',          
                );
                DB::commit();                
                
                
            }catch (\Exception $e) {
                    DB::rollBack();
                    $data =  array (
                        'status' => 0,
                        'error' => 1,
                        'msg'   => $e->getMessage(),          
                    );                    
                } 
        }else{
          $data =  array (
          'status' => 0,
          'error' => 1,
          'msg'   => 'Cms id is missing',          
          );   
        }
        
        return json_encode($data);
	}   
	
}
