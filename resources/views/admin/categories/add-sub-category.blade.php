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
			<li class="active">Add Sub Category</li>
		</ol>
	</section>
	<div class="box">
		<div class="box-header with-border">
		  <h3 class="box-title">Add Sub Category</h3>
		</div>
        <!-- /.box-header -->
        @include('adminlayouts.message')
		<section class="content"> 
		<form role="form" action="{{route('admin.add.sub-category')}}" method="post"  enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="box-body">
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					<label>Sub Category Name </label>
					<div class="row">
						<div class="col-xs-6">
							<input name="name" type="text"  class="form-control" autocomplete="off" placeholder="enter sub-category name" required>
						</div>
					</div>
				  @if ($errors->has('name'))
					<span class="help-block">
					  <strong>{{ $errors->first('name') }}</strong>
					</span>
				  @endif
				</div>
			  
				<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }} ">
					<label>Select Category</label>
					<div class="row">
						<div class="col-xs-6">
						<select class="form-control" name="category" id="category" >
							<option value="0">Select Category</option>
							@foreach($categories as $category)
							@php $Id = $category->category_id @endphp
							<option value="{{$category->category_id}}" @if (old('category') == $Id) selected="selected" @endif>{{$category->name}}</option>
							@endforeach
						</select>
						</div>
					</div>
					@if ($errors->has('category'))
						<span class="help-block">
							<strong>{{ $errors->first('category') }}</strong>
						</span>
					@endif
				</div>
			  
			  <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
					<label for="exampleInputreason1">Description</label>
						<div class="row">
							<div class="col-xs-6">
								<textarea rows="4" cols="50" class="form-control input_width" id="description11" name="description"  placeholder="description"></textarea>
							</div>
						</div>
					@if ($errors->has('description'))
						<span class="help-block">
							<strong>{{ $errors->first('description') }}</strong>
						</span>
					@endif	
				</div>
			  
				<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }} ">
					<label>Status</label>
					<div class="row">
						<div class="col-xs-6">
						<select class="form-control" name="status" id="status" required>
							<option value="1">active</option>
							<option value="0">Inactive</option>                  
						</select>
					   </div>
					</div>
					@if ($errors->has('status'))
						<span class="help-block">
							<strong>{{ $errors->first('status') }}</strong>
						</span>
					@endif
				</div>
			  
							
				<div class='form-group'>
					<input type="file" name="cat_images" id="fileToUpload" class = 'btn btn-default btn-file' multiple>
				</div>            

			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
		</section>
            

	</div>
<script type="text/javascript">

	$(function() {
		CKEDITOR.replace('description11');
		
		$(".textarea").wysihtml5();
	});

$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
		//alert(countryID);
        if(countryID){
            $.ajax({
                type:'GET',
                url:'/fetch-state',
                data:'_token=<?php echo csrf_token(); ?>&cid='+countryID,
                success:function(html){
					
                    $('#state').html(html);
                    
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country </option>');
            $('#city').html('<option value="">Select state </option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
		//alert(stateID);
        if(stateID){
            $.ajax({
                type:'GET',
                url:'/fetch-city',
                data:'_token=<?php echo csrf_token(); ?>&stid='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state </option>'); 
        }
    });
});
</script>    
@endsection
