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
              <h3 class="panel-title">Product Details</h3>
            </div>
            <div class="panel-body">
              <div class="row">                            
                <div class=" col-md-12 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>
					@if(!empty($Product))  
                    <tr>
                        <td>Product Name</td>
                        <td>{!! $Product->productName !!}</td>
                    </tr>
                    <tr>
                        <td>Category Name</td>
                        <td>{!! $Product->CategoryName !!}</td>
                    </tr>
                    <tr>
                        <td>Model</td>
                        <td>{!! $Product->model !!}</td>
                    </tr>
                    <tr>
                        <td>Sku</td>
                        <td>{!! $Product->sku !!}</td>
                    </tr>
                    <tr>
                       <td>Status</td>
                       <td style="<?php echo ($Product->status==1)? "color:green;":"color:red;";?>" ><b><?php echo ($Product->status==1)? "Active":"Inactive";?></b></td>
                    </tr>
                    <tr>
                        <td>Price</td>
						 <td>{!! $Product->price !!}</td>
                    </tr>
                    <tr>
                        <td>Date available</td>
						<td>{!! date('d M Y',strtotime($Product->date_available))!!}</td>
                    </tr>
                      <tr>
                        <td>Image</td>
                        <td> 
							@php $path = '/uploads/product/image/'.$Product->productImage ; 
							@endphp
							@if($Product->image)
							<span class="img-admin-Ad"><img style="width:50px; height:50px;" src="{{URL::asset($path) }}" width="50%" class="img-circle" alt=" Not-Found-Image"></span>
							@else
							N/A
							@endif
					   </td>
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
