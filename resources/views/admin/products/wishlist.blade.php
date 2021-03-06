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
			<li class="active">User's WishList</li>
		</ol>
	</section>

	<div class="box">
		<div class="box-header with-border">
		  <h3 class="box-title">User's WishList Products</h3>
		  @include('adminlayouts.partials.WishlistSearchForm')
		</div>
		<section class="content"> 
				<!-- /.box-header -->
				@include('adminlayouts.message')
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover" id="wishlisttable">
					<thead>
						<tr>
						  <th>Sr.No</th>
						  <th>User Name</th>
						  <th>Product Name</th>                
						  <th>Added Date</th>                  
						  <th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if(!empty($wishlists) > 0)
						@foreach($wishlists as $key=>$wishlist)
						<tr>
							<td>{{ ++$i }}</td>
							<td>{{$wishlist->userName}}</td>
							<td>{{$wishlist->productName}}</td>               
							<td>{!!date("d M Y h:i A",strtotime($wishlist->wishlistDate))!!}</td>
							<td><button type="button" class="btn btn-danger confirmDialog" product_id="{{$wishlist->product_id}}" recordid="{{$wishlist->user_id}}">Remove</button></td>                
						</tr>
						@endforeach
						@else
						<tr><td colspan="7">No record.</td></tr>
						@endif
					</tbody>
				</table>
			</div>
		<!-- /.box-body -->     
		</section>
		<input type="hidden" id="p_id" />
		<input type="hidden" id="c_id" />
	</div>
    <script type="text/javascript">
		$(document).ready(function(){
		  // open modal
		  $('.confirmDialog').click(function(){
				var cid = $(this).attr('recordId');
				var pid = $(this).attr('product_id');
				$('#c_id').val(cid);
				$('#p_id').val(pid);    
				$('#popUpinfo').modal('show');
		  });

		  // if user click on the go button
		  $('#SureGo').click(function(){ 
			  window.location.replace(APP_URL+"/admin/wishlist/delete/"+$('#c_id').val()+"/"+$('#p_id').val());      
		  });    
		});
	</script>
@endsection
