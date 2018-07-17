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
        <li class="active">Review list</li>
    </ol>
    </section>
	
		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Review's list</h3>
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
					  <th>Rating</th>
					  <th>Model</th>
					  <th>Price</th>
					  <th>Image</th>
					  <!--<th>Action</th>-->
					</tr>
                </thead>
                <tbody>
					@if(count($reviewList) > 0)
					@foreach($reviewList as $review)
					<tr>
					  <td>{{++$i}}</td>
					  <td>{{$review->productName}}</td>
					  <td>{{$review->rating}}</td>
					  <td>{{$review->model}}</td>
					  <td>{{$review->price}}</td>
					 
					   <td>
						@php $path = '/uploads/product/image/'.$review->image ; 
						@endphp
						@if($review->image)
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
