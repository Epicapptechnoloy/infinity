<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Model\Countries;
use App\Model\States;
use App\Model\Cities;
use Response;
use DB;
use Auth;
class LocationController extends Controller
{
    // this is for maintain the record status globaly
    const STATUS = 1;
/***********
***Author       : Rajiv Kumar
***Action       : countrylist
***Description  : This action is used to listing of country , state and city
***Date         : 21-01-2018
***Params       : null
***return       : void(0) 
*************/
    public function countrylist(Request $request){
        // initialise country id
        $FirstCountry   = Countries::where('status',self::STATUS)->orderBy('name','ASC')->first()->id;
        $StateId        = States::where('status',self::STATUS)->where('country_id',$FirstCountry)->orderBy('name','ASC')->first()->id;
        
        // if want to filter by country
        if(isset($request->country) && !empty($request->country)){
           $FirstCountry =  $request->country;
        }
        // if want to filter by state
        if(isset($request->state) && !empty($request->state)){
           $StateId =  $request->state;
        }
        
        // fetch all countries,states and cities  used in search bar
        $countries  = Countries::where('status',self::STATUS)->orderBy('name','ASC')->get();
        $states     = States::where('status',self::STATUS)->where('country_id',$FirstCountry)->orderBy('name','ASC')->get();
        $cities     = Cities::where('status',self::STATUS)->where('state_id',$StateId)->orderBy('name','ASC')->get();
        
        $records = DB::table('sb_countries as ctry')
            ->leftJoin('sb_states as sta', 'ctry.id', '=', 'sta.country_id')
            ->leftJoin('sb_cities as cty', 'sta.id', '=', 'cty.state_id')
            ->select('ctry.name as CountryName','sta.name as StateName','cty.name as CityName',
                     'ctry.id as CountryId','sta.id as stateId','cty.id as CityId','ctry.sortname as CountrySortName',
                     'ctry.phonecode as CountryPhnCode','ctry.status as CountryStatus',
                     'sta.status as StateStatus','cty.status as CityStatus')
            ->where('ctry.id',$FirstCountry)
            ->where('sta.id',$StateId)
            ->paginate(env("RECORD_PER_PAGE"));
            
            return view('admin.location.list',
                        array(
                              'params'=>$request,
                              'records'=>$records,
                              'countries'=>$countries,
                              'states'=>$states,
                              'cities'=>$cities
                              )
                        );
        
    }
/***********
***Author       : Rajiv Kumar
***Action       : statelist
***Description  : This action is used to fetch states
***Date         : 21-01-2018
***Params       : country id
***return       : void(0) 
*************/
    public function statelist(Request $request){
       //checking request  
        if($request->ajax()){
                $states     = States::where('status',self::STATUS)
                ->where('country_id',$request->cid)->select('id','name')->orderBy('name','ASC')->get();
                return array(
                        'status' => 1,
                        'error'  => 0,
                        'data'   => json_encode($states),
                        'msg'    => 'Listing successfully'
                       );
            }else{
                echo '';
                return array(
                        'status' => 0,
                        'error'  => 1,
                        'data'   => null,
                        'msg'    => 'Oops! This is not valid request.'
                       );
            }
        
    }
/***********
***Author       : Rajiv KUmar
***Action       : citylist
***Description  : This action is used to listing of city
***Date         : 21-01-2018
***Params       : null
***return       : void(0) 
*************/
    public function citylist(Request $request){
        //checking request  
        if($request->ajax()){
                $cities     = Cities::where('status',self::STATUS)
                ->where('state_id',$request->sid)->select('id','name')->orderBy('name','ASC')->get();
                return array(
                        'status' => 1,
                        'error'  => 0,
                        'data'   => json_encode($cities),
                        'msg'    => 'Listing successfully'
                       );
            }else{
                echo '';
                return array(
                        'status' => 0,
                        'error'  => 1,
                        'data'   => null,
                        'msg'    => 'Oops! This is not valid request.'
                       );
            }
    }
/***********
***Author       : Rajiv Kumar
***Action       : add location
***Description  : This action is used to add location
***Date         : 21-01-2018
*************/ 
	public function addlocation(Request $request){
    if ($request->isMethod('post')) {
        $this->validate($request, [
                "location_country"   => "required|not_in:0",
                "location_state"     => "required|not_in:0",
                "location_city"      => "required|string",               
            ]);
       
            DB::beginTransaction();
            try {
                        $City 				= new Cities();                        
                        $City->state_id       = $request->location_state;                        
                        $City->name         = $request->location_city;
                        $City->updated_by   = Auth::guard('admin')->user()->id;
                        $City->save();
                        
                        \Session::flash('success','Location created successfully.');                        
                        DB::commit();
                        return redirect()->route('locationlist');
                }
                catch (\Exception $e) {
                    DB::rollBack();                    
                    return back()->withInput($request->input())->withErrors([$e->getMessage()]);
                        
                }
    }
        $countries  = Country::where('status',self::STATUS)->orderBy('name','ASC')->get();        
		return view('admin.location.add-location',['countries' => $countries]);
		
	}
	
	
/***********
***Author       : Rajiv Kumar
***Action       : Add Country
***Description  : This action is used to add country
***Date         : 21-01-2018
*************/ 
public function countryname(Request $request){
	if($request->ajax()){
            try {
                DB::beginTransaction();
                    $ctry = Countries::where('name',$request->sid)->where('sortname',$request->ccode)->first();
                    if($ctry === null){
                        $Country 				= new Countries();                                                
                        $Country->name          = $request->sid;
                        $Country->sortname      = $request->ccode;
                        $Country->updated_by    = Auth::guard('admin')->user()->id;
                        $Country->save();
                        $data = array(
                                'status' => 1,
                                'error'	=>0,
                                'msg' => 'Country created successfully.',
                                'data' => $Country
                            );                                 
                        DB::commit();
                    }else{
                        $data = array(
                                'status' => 0,
                                'error'	=>1,
                                'msg' => 'Country already added.'                                
                            );                                 
                    }   
                }
                catch (\Exception $e) {
                    $data = array(
                        'status' => 0,
                        'error'	=>1,
                        'msg' => 'Oops! Some thing is wrong.'
                    );
                }
	}else{
		$data = array(
		'status' => 0,
		'error'	=>1,
		'msg' => 'Method not allowed from browser.'
		);
	} 
	return response()->json($data, 200); 
}

	/***********
	***Author       : Rajiv
	***Action       : Delete City
	***Description  : This action is used to delete city
	***Date         : 22-01-2018
	*************/
	public function deletecity(Request $request){
		if($request->did){
			DB::beginTransaction();
			try {
				$cms = Cities::where('id',$request->did)->first();
				$cms->delete();
				DB::commit();    
				return redirect(route('locationlist'));
				}catch (\Exception $e){
					DB::rollBack();
					return back()->withError([$e->getMessage()]);
				}
			
		}
	}
	
	/***********
	***Author       : Rajiv Kumar
	***Action       : Edit City
	***Description  : This action is used to edit City
	***Date         : 22-01-2018
	*************/
	public function editlocation(Request $request){
    //when form submit
   if ($request->isMethod('post')) {
    
    $this->validate($request, [            
            "location_city"     => "required|string",            
        ]);
        
            DB::beginTransaction();
            try {
                        
                        $cityObj = Cities::where('id', '=', $request->city_id)->first();
                        $cityObj->name = $request->location_city;                                               
                        $cityObj->save();
                        /********************Orgnisation section end here **********************/
                        \Session::flash("success","City has been updated successfully.");                        
                        DB::commit();
                        return redirect()->route('locationlist');
                }
                catch (\Exception $e) {
                    DB::rollBack();                    
                    return back()->withInput($request->input())->withErrors([$e->getMessage()]);                        
                }
    }    
	$cities = City::where('id', '=', base64_decode($request->id))->first();    
    return view('admin.location.edit-location',array('cities'=>$cities));
    }
	/***********
	***Author       : Rajiv Kumar
	***Action       : add state
	***Description  : This action is used to add new state
	***Date         : 21-01-2018
	*************/
	public function AddState(Request $request){
        if($request->ajax()){
            try {
                DB::beginTransaction();
                    $state = States::where('name',$request->stateName)->where('country_id',$request->cid)->first();
                    if($state === null){
                        $state 				= new States();                                                
                        $state->name        = $request->stateName;
                        $state->country_id  = $request->cid;
                        $state->updated_by  = Auth::guard('admin')->user()->id;
                        $state->save();
                        $data = array(
                                'status' => 1,
                                'error'	=>0,
                                'msg' => 'State created successfully.',
                                'data' => $state
                            );                                 
                        DB::commit();
                    }else{
                        $data = array(
                                'status' => 0,
                                'error'	=>1,
                                'msg' => 'State already added.'                                
                            );                                 
                    }   
                }
                catch (\Exception $e) {
                    $data = array(
                        'status' => 0,
                        'error'	=>1,
                        'msg' => 'Oops! Some thing is wrong.'
                    );
                }
	}else{
		$data = array(
		'status' => 0,
		'error'	=>1,
		'msg' => 'Method not allowed from browser.'
		);
	} 
	return response()->json($data, 200);
    }
    
}

