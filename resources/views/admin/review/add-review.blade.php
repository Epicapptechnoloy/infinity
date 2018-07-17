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
        <li class="active">Add Review</li>
      </ol>
    </section>
      <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add Review</h3>
            </div>
            <!-- /.box-header -->
           @include('adminlayouts.message')
		<section class="content"> 
		<form role="form" action="{{route('admin.add.review')}}" method="post"  enctype="multipart/form-data">
              {{ csrf_field() }}
			<div class="box-body">
			<div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
				<label>Rating</label>
                <div class="row">
				    <div class="col-xs-6">
						<input name="rating" type="text"  class="form-control" placeholder="enter rating" required>
					</div>
				</div>
			  @if ($errors->has('rating'))
				<span class="help-block">
				  <strong>{{ $errors->first('rating') }}</strong>
				</span>
			  @endif
			</div>
          
		
		  
			<div class="form-group{{ $errors->has('comments') ? ' has-error' : '' }}">
				<label for="exampleInputreason1">Comments</label>
					<div class="row">
						<div class="col-xs-6">
							<textarea rows="4" cols="50" class="form-control input_width" id="description" name="comments"  placeholder="comments"></textarea>
						</div>
					</div>
				@if ($errors->has('comments'))
					<span class="help-block">
						<strong>{{ $errors->first('comments') }}</strong>
					</span>
				@endif	
			</div>
			
			<div class="form-group{{ $errors->has('product') ? ' has-error' : '' }} ">
                <label>Select Product</label>
				<div class="row">
					<div class="col-xs-6">
					<select class="form-control" name="product" id="product" >
						<option value="0">Select Product</option>
						@foreach($product as $pt)
						@php $Id = $pt->product_id @endphp
						<option value="{{$pt->product_id}}" @if (old('product') == $Id) selected="selected" @endif>{{$pt->name}}</option>
						@endforeach
					</select>
					</div>
				</div>
                @if ($errors->has('product'))
					<span class="help-block">
						<strong>{{ $errors->first('product') }}</strong>
					</span>
				@endif
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
		CKEDITOR.replace('description');
		
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
