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
              <h3 class="panel-title">Invoice Number : {{$order->invoice_prefix}}{{$order->invoice_no}}</h3>
            </div>
            <div class="panel-body">
              <div class="row">                            
                <div class=" col-md-12 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name</td>
                        <td>{{$order->firstname}} {{$order->lastname}}</td>

                      </tr>
                      <tr>
                        <td>Quantity</td>
                        <td>10</td>
                      </tr>
                     
                      <tr>
                        <td>Phone</td>
                        <td>{{ $order->telephone }}</td>
                      </tr>
                      
                      <tr>
                        <td>Status</td>
                        @if($order->status ==1 )
                        <td>completed</td>
                        @else
                        <td>Under Process</td>
                        @endif
                      </tr>                  
                      <tr>
                        <td>Billing Address</td>
                        
                        <td>NA</td>
                        
                      </tr> 
                      <tr>
                        <td>Shipping Address</td>
                        
                        <td>NA</td>
                        
                      </tr>                 
                    </tbody>
                  </table>                

                </div>
              </div>                           
                
            </div>
               
          </div>

          {{-- <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Appointment History</h3>
            </div>
              <div class="panel-body">
                  <div class="row">                            
                    <div class=" col-md-12 col-lg-12 "> 
                      <table class="table table-user-information">
                        <tbody>
                          @php   $i=0 ;       @endphp
                                    

                          <tr>
                            <td>Clinic Name</td>
                            <td>{{ $appointment->clinic->clinicName }}</td>
                          </tr>
                          <tr>
                            <td>Appointment Date</td>
                            <td>{{ $appointment->appt_date }}</td>
                          </tr>
                        </tbody>
                      </table>          
                  </div>
                </div>                          
              </div>
          </div> --}}

              



        </div>
      </div>
    </div>

@endsection
