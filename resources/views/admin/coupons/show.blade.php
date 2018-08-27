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
							<td>{{$coupon->name}}</td>
						</tr>
						
						<tr>
							<td>Coupon Code</td>
							<td>{{ $coupon->coupon_code }}</td>
						</tr>
						
						<tr>
							<td>Discount</td>
							<td>{{ $coupon->discount }}</td>
						</tr>
						
						<tr>
							<td>Minimum Order Price</td>
							<td>Rs. {{ $coupon->amount_limit }}</td>
						</tr>
						
						<tr>
							<td>Valid From</td>
							<td>{!!date("d M Y ",strtotime($coupon->valid_from))!!}</td>
						</tr>
						
						<tr>
							<td>Valid To</td>
							 <td>{!!date("d M Y ",strtotime($coupon->valid_to))!!}</td>
						   
						</tr>
					   
						<tr>
							<td>Status</td>
							@if($coupon->status ==1 )
							<td><span class="label label-success">Active</span></td>
							@else
							<td><span class="label label-warning">Inactive</span></td>
							@endif
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
