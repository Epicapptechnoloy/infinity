@extends('adminlayouts.master')

@section('content')

<style>
#customerlisttable{
	min-height:300px !important;
}
</style>
<!-- Default box -->
	<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/home"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Order list</li>
      </ol>
    </section>

      <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Wishlist's list</h3>
            </div>
            <section class="content"> 
            <!-- /.box-header -->
       
            <!-- /.box-header -->
             @include('adminlayouts.message')
            
     <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <table class="table table-hover" id="customerlisttable">
                <thead>
					<tr>
					  <th>Sr. No</th>
					  <th>Product Name</th>                   
					  <th>Model</th>
					  <th>Price</th>
					  <th>Order Date</th>
					  <th>Quantity</th>
					  <th>Image</th>
					
					</tr>
                </thead>
                <tbody>
					@if(count($wishList) > 0)
					@foreach($wishList as $wList)
					<tr>
					  <td>{{++$i}}</td>
					  <td>{{$wList->productName}}</td>
					  <td>{{$wList->model}}</td>
					  <td>{{$wList->price}}</td>
					  <td>{{$wList->created_at}}</td>
					  <td>{{$wList->quantity}}</td>
					   <td>
						@php $path = '/uploads/product/image/'.$wList->image ; 
						@endphp
						@if($wList->image)
						<span class="img-admin-Ad"><img style="width:50px; height:50px;" src="{{URL::asset($path) }}" width="50%" class="img-circle" alt=" Not-Found-Image"></span>
						@else
						N/A
						@endif
					   </td>
					</tr>
					@endforeach
						@else
					<tr><td colspan="7">No record.</td></tr>
					@endif
                </tbody>
            </table>
            </div>
    </section>           
   </div>
     
@endsection
