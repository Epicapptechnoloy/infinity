@extends('adminlayouts.master')

@section('content')
<!-- Default box -->
		<section class="content-header">
			<h1>
				Dashboard
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="/"><i class="fa fa-dashboard"></i>Home</a></li>
				<li class="active">User's WishList</li>
			</ol>
		</section>

		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">User's WishList Products</h3>
            </div>
			<section class="content"> 
					
					<!-- /.box-header -->
					 @include('adminlayouts.message')
		   
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover" id="wishlisttable">
							<thead>
							<tr>
							  <th>Id</th>
							  <th>user_id</th>
							  <th>product_id</th>                
							  <th>Added Date</th>                  
							  <th>Action</th>
							</tr>
							</thead>
							<tbody>
								@if(count($wishlists) > 0)
								@foreach($wishlists as $key=>$wishlist)
								<tr>
									<td>{{ ++$key }}</td>
									<td>{{$wishlist->user_id}}</td>
									<td>{{$wishlist->product_id}}</td>               
									<td>{!!date("d M Y h:i A",strtotime($wishlist->created_at))!!}</td>
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
