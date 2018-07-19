@extends('adminlayouts.master')

@section('content')
<!-- Default box -->
	<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User list</li>
      </ol>
    </section>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">User's list</h3>
			<!-- form for seraching here-->
			@include('adminlayouts.partials.CustomerSearchForm')
			<!-- end here-->
			@include('adminlayouts.message')
        </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
				<table class="table table-hover" id="customerlisttable">
					<thead>
						<tr>
						  <th style="width: 10px" >S.No</th> 
						  @php
							if( app('request')->input('order-by') == 'asc')
							  $orderBy = 'desc';
							else
							  $orderBy = 'asc';  

							  if( app('request')->input('page'))
							  $page = app('request')->input('page');
							else
							  $page = 1;                      
						  @endphp
						  <th><a href="{{ route('admin.customers', array('verified' => $params->verified,  'status' => $params->status,  's' => $params->s)) }}&sort-by=name&order-by={{$orderBy}}&page={{$page}}">Name&nbsp;&nbsp;<i class="fa fa-sort" aria-hidden="true"></i></a></th>
						  <th><a href="{{ route('admin.customers', array('verified' => $params->verified,  'status' => $params->status,  's' => $params->s)) }}&sort-by=email&order-by={{$orderBy}}&page={{$page}}">Email&nbsp;&nbsp;<i class="fa fa-sort" aria-hidden="true"></i></a></th>
						  <th>Phone</th>
						 
						 <!--<th>Verified</th>-->
						  <th>Status</th>
						  <th>Action</th>
						</tr>
					</thead>
                <tbody>
				
				@if(count($customers) > 0)
                @foreach($customers as $customer)
                <tr>
                  <td>{{++$i}}</td>
				 
                  <td>{{ucfirst($customer->name)}}</td>
                  <td>{{$customer->email}}</td>
                  <td>{{$customer->number}}</td>
                 
					  {{-- <td>
                 	@if($customer->is_featured)
                              <a class="customerVerified" status="{{$customer->is_featured}}" href="javascript:void(0);" id="featurestatus_{{$customer->id}}" customer-id="{{$customer->id}}"><span class="label label-success">No</span></a>
					@else
						  <a class="customerVerified" status="{{$customer->is_featured}}" href="javascript:void(0);" id="featurestatus_{{$customer->id}}" customer-id="{{$customer->id}}"><span class="label label-danger">Yes</span></a>
					@endif                    
					  </td>--}}
                  <td>
					 @if($customer->status == '1')
						 <a class="customerStatus" status="{{$customer->status}}" href="javascript:void(0);" id="status_{{$customer->id}}" customer-id="{{$customer->id}}"><span class="label label-success">Active</span></a>
					@elseif($customer->status =='0')
						  <a class="customerStatus" status="{{$customer->status}}" href="javascript:void(0);" id="status_{{$customer->id}}" customer-id="{{$customer->id}}"><span class="label label-danger">Inactive</span></a>
					@else
						  <a class="customerStatus" status="{{$customer->status}}" href="javascript:void(0);" id="status_{{$customer->id}}" customer-id="{{$customer->id}}"><span class="label label-warning">Pending</span></a>
					@endif
                  </td>
				  
				  <td>
                    <div class="btn-group">
                       <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
						
						<ul class="dropdown-menu" role="menu">
							<li><a title="Delete" class="confirmDialog " href="javascript:void(0);" recordId="{{$customer->id}}">Delete</a></li>
							<li><a href="{{route('edit-customer',[str_replace(' ','-',$customer->name),base64_encode($customer->id)])}}">Edit</a>
							</li>
							<li><a href="{{route('admin.customer.show',[base64_encode($customer->id)])}}">viewUser</a>
							</li>
							<li><a href="{{route('admin.customerOrder.orderList',[base64_encode($customer->id)])}}">OrderList</a>
							<li><a href="{{route('admin.customerWishlist.wishList',[base64_encode($customer->id)])}}">Wishlist</a>
							</li>
							<li><a href="{{route('admin.customerCart.cartList',[base64_encode($customer->id)])}}">viewCart</a>
							</li>
							
							<li><a href="{{route('admin.customerReview.reviewList',[base64_encode($customer->id)])}}">viewReview</a>
							</li>
						</ul>
						
                    </div>
                  </td>  

					
				  
                 <!-- <td>
					   @if(isset($customer->id) && !empty($customer->id)) 
                   <a class='btn btn-success btn-xs btn-default' 
                   href="{{route('edit-customer',[str_replace(' ','-',$customer->name),base64_encode($customer->id)])}}">
                   Edit</a>
                   @else
                   <a class='btn btn-success btn-xs btn-default' 
                   href="{{route('edit-customer',[str_replace(' ','-',$customer->name),base64_encode($customer->id)])}}">
                   Edit</a>
                   @endif                     
                  
                    <a class="confirmDialog btn btn-danger btn-xs btn-default" href="javascript:void(0);" recordId="{{$customer->id}}">Delete</a> 
                    @if(isset($customer->id)) 
                    <a class='btn btn-info btn-xs btn-default' href="{{route('admin.customer.show',[base64_encode($customer->id)])}}">View</a></td>-->
                    @endif
					</td>                
				</tr>
					@endforeach
					
					@else
				<tr><td colspan="7">No record.</td></tr>
					@endif
                </tbody>
              </table>
			  <div class="box-footer clearfix">  
			  {{ $customers->appends(request()->except('page'))->links() }}
				  {{-- {{ $customers->appends(['s' => $params->s,'status' =>$params->status ])->render() }}--}}
            </div>
            </div>
            <input type="hidden" id="rec_id" />
            <!-- /.box-body -->
            
			
          </div> 
<script>
  $(function () {
     $('#datepicker').datepicker({
      autoclose: true
    });
  $('#datepicker1').datepicker({
      autoclose: true
    });
  });
</script>
<script type="text/javascript">
$(document).ready(function(){

  // open modal
  $('.confirmDialog').click(function(){
        var rid = $(this).attr('recordId');
        $('#rec_id').val(rid);    
        $('#popUpinfo').modal('show');
  });

  // if user click on the go button
  $('#SureGo').click(function(){ 
	  window.location.replace(APP_URL+"/admin/user/delete/"+$('#rec_id').val());         
          //~ $.ajax({
               //~ type:'GET',
               //~ url:'customer/delete/'+$('#rec_id').val(),
               //~ data:'_token = <?php echo csrf_token() ?>',
               //~ success:function(data){
                  //~ $('#popUpinfo').modal('hide');
                  
                  //~ if(data.error == 0){
                    //~ $('#msgContainer').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4><p>'+data.message+'</p>');
                  //~ }else{
                        //~ $('#msgContainer').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Alert!</h4><p>'+data.message+'</p>');
                  //~ }
                  //~ $('#RecordNo_'+$('#rec_id').val()).remove();
               //~ }
            //~ });
  });
    
});
</script>
@endsection
