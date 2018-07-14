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
              <h3 class="panel-title">User Details</h3>
            </div>
            <div class="panel-body">
              <div class="row">                            
                <div class=" col-md-12 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>
					@if(!empty($customer))
                    <tr>
                        <td>User name</td>
                        <td>{!! $customer['name'] !!}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{!! $customer['email'] !!}</td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td>{!!  ucfirst($customer['number']) !!}</td>
                    </tr>
                  
                    <tr>
                       <td>Status</td>
                       <td style="<?php echo ($customer['status']==1)? "color:green;":"color:red;";?>" ><b><?php echo ($customer['status']==1)? "Active":"Inactive";?></b></td>
                    </tr>
                    <tr>
                        <td>Pin Code</td>
						 <td>{!! $customer['zipcode'] !!}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
						<td>{!! $customer['address'] !!}</td>
                    </tr>
                      
                    @endif                
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
