@extends('adminlayouts.master')

@section('content')
<!-- Default box -->
	<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/home"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Product list</li>
      </ol>
    </section>

    <div class="box">
		<div class="box-header with-border">
		  <h3 class="box-title">Product's list</h3>
		  <!-- form for seraching here-->
			@include('adminlayouts.partials.ProductSearchForm')
		<!-- end here-->
		</div>
        <section class="content"> 
           
		<!-- /.box-header -->
		 @include('adminlayouts.message')
   
		<div class="box-body table-responsive no-padding">
			<table class="table table-hover" id="customerlisttable">
				<thead>
					<tr>
					  <th style="width:05%">Sr. No.</th>
					  <th style="width:10%">Name</th>
					  <th style="width:10%">SKU</th>
					  <th style="width:10%">Model</th>
					  <th style="width:10%">Quentity</th>
					  <th style="width:10%">Status</th>
					  <th style="width:10%">Image</th>
					  <th style="width:10%">Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($products) > 0)
					@foreach($products as $product)

					<tr>
					  <td>{{ ++$i}}</td>
					  <td>{{ucfirst($product->name)}}</td>
					  <td>{{$product->sku}}</td>               
					  <td>{{$product->model}}</td>               
					  <td>{{$product->quantity}}</td>               
					  <td>
						@if($product->status == 1)
						  <span class="label label-success">Active</span>
						@else
						  <span class="label label-warning">Inactive</span>
						@endif
					  </td>
					  <td>
						@php $path = '/uploads/product/image/'.$product->image ; 
						@endphp
						@if($product->image)
						<span class="img-admin-Ad"><img style="width:50px; height:50px;" src="{{URL::asset($path) }}" width="50%" class="img-circle" alt=" Not-Found-Image"></span>
						@else
						N/A
						@endif
					 </td>	
					
					  <td>
						<div class="btn-group">
						   <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
						   
							
							<ul class="dropdown-menu" role="menu">
								
								<li><a href="{{ route('editProduct', ['product_id' => base64_encode($product->product_id)]) }}">Edit</a>
								</li>
								<li><a href="{{ route('admin.view-product', ['product_id'=>base64_encode($product->product_id)]) }}">viewProduct</a>
								</li>
								<li><a class="confirmDialog" href="javascript:void(0);" recordId="{{$product->product_id}}">Delete</a></li>
							</ul>
							
						</div>
					  </td>                
					</tr>
					@endforeach
					@else
					<tr><td colspan="7">No record.</td></tr>
				@endif
				</tbody>
			</table>
			<div class="row">
				<div class="dataTables_info" id="datatable-responsive_info" role="status" aria-live="polite">
				{{ $products->appends(request()->except('page'))->links() }}
				</div>
			</div>
		</div>
	<!-- /.box-body -->     
        
    </section>
	<input type="hidden" id="p_id" />
	</div>
    <script type="text/javascript">
	$(document).ready(function(){

	  // open modal
	  $('.confirmDialog').click(function(){
			var pid = $(this).attr('recordId');       
			$('#p_id').val(pid);
			$('#popUpinfo').modal('show');
	  });

	  // if user click on the go button
	  $('#SureGo').click(function(){ 
		  window.location.replace(APP_URL+"/admin/delete-product/"+$('#p_id').val());      
	  });    
	});

	</script>  
@endsection
