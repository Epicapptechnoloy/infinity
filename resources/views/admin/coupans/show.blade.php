@extends('adminlayouts.master')
@section('content')
<div class=" col-md-offset-11 paddingBottom10">
    <a class="btn btn-primary" href="{{ URL::previous() }}"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a> 
</div>

<div class="container">
         
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
      
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Discount and Offer</h3>
            </div>
            <div class="panel-body">
              <div class="row">                            
                <div class=" col-md-12 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name</td>
                        <td>{{$coupan->name}}</td>
                      </tr>
                      <tr>
                        <td>Code</td>
                        <td>{{ $coupan->code }}</td>
                      </tr>
                      <tr>
                        <td>Discount</td>
                        <td>{{ $coupan->discount }}</td>
                      </tr>
                      <tr>
                        <td>Minimum Order</td>
                        <td>{{ $coupan->min_total }}</td>
                      </tr>
                      <tr>
                        <td>Total Discount</td>
                        <td>{{ $coupan->total }}</td>
                      </tr>
                      <tr>
                        <td>Select Type</td>
                        <td>
							@if($coupan->status ==1 )
								Flat
							@elseif($coupan->status ==2)
								Percentage
							@else
								Undefined
							@endif
							
						</td>
                      </tr>
                      <tr>
                        <td>Start Date</td>
						 <td>{!!date("d M Y h:i A",strtotime($coupan->date_start))!!}</td>
                        
                      </tr>
                      <tr>
                        <td>End Date</td>
						 <td>{!!date("d M Y h:i A",strtotime($coupan->date_end))!!}</td>
                       
                      </tr>
                      <tr>
                        <td>Uses total</td>
                        <td>{{ $coupan->uses_total }}</td>
                      </tr>
                      
                      <tr>
                        <td>Uses Per Customer</td>
                        <td>{{ $coupan->uses_customer }}</td>
                      </tr>
                      
                      <tr>
                        <td>Status</td>
                        @if($coupan->status ==1 )
                        <td><span class="label label-success">Active</span></td>
                        @else
                        <td><span class="label label-warning">Inactive</span></td>
                        @endif
                      </tr>                  
                      <tr>
                        <td>Image</td>
                        
                        <td>
							@php $path = '/uploads/coupan/image/'.$coupan->image ; 
							@endphp
							@if($coupan->image)
							<span class="img-admin-Ad"><img style="width:50px; height:50px;" src="{{URL::asset($path) }}" width="50%" class="img-circle" alt=" Not-Found-Image"></span>
							@else
							N/A
							@endif
					   </td>
                      </tr> 
                                     
                    </tbody>
                  </table>                

                </div>
              </div>                           
                
            </div>
               
          </div>

        </div>
      </div>
    </div>

@endsection
