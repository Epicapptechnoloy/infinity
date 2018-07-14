@extends('adminlayouts.master')
@section('content')

	<div class="container">
         
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
      
		<div class="panel panel-info">
				
            <div class="panel-body">
				<div class="row">                            
					<div class=" col-md-12 col-lg-12 "> 
						<table class="table table-user-information">
						@if(!empty($products))
							<tbody>
							<?php //dd($products->name); ?>
							
								<tr>
									<td>Name</td>
									<td>{{ $products->name }}</td>

								</tr>
								<tr>
									<td>Model</td>
									<td>{{ $products->model }}</td>
								</tr>
								<tr>
									<td>Quantity</td>
									<td>{{ $products->quantity }}</td>
								</tr>
								<tr>
									<td>Shipping</td>
									<td>{{ $products->Shipping }}</td>
								</tr>
								<tr>
									<td>sku</td>
									<td>{{$products->sku }}</td>
								</tr>
								<tr>
									<td>price</td>
									<td>{{$products->price }}</td>
								</tr>
								<tr>
									<td>date_available</td>
									<td>{{$products->date_available }}</td>
								</tr>
								<tr>
									<td>weight</td>
									<td>{{$products->weight }}</td>
								</tr>
								
								               
							</tbody>
						@endif
						</table>                

					</div>
				</div>                           
                
            </div>
               
        </div>

    </div>
     

@endsection
