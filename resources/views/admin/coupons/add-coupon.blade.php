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
            <li class="active">Add Discount and Offers</li>
        </ol>
    </section>
    <div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Add Discount and Offers</h3>
	</div>
        <!-- /.box-header -->
    @include('adminlayouts.message')
    <section class="content"> 
		<section class="content"> 
			<form role="form" action="{{route('admin.add.coupon')}}" method="post"  enctype="multipart/form-data">
					  {{ csrf_field() }}
				<div class="box-body">
					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<label>Coupan Name </label>
							<div class="row">
								<div class="col-xs-6">
								<input name="name" type="text"  class="form-control" autocomplete="off" placeholder="enter name" >
							</div>
						</div>
						@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>
				   
				 
					<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
						<label>Coupon Code </label>
						<div class="row">
							<div class="col-xs-6">
								<input name="code" type="text"  class="form-control" autocomplete="off" placeholder="enter code" >
							</div>
						</div>
						  @if ($errors->has('code'))
							<span class="help-block">
								<strong>{{ $errors->first('code') }}</strong>
							</span>
						  @endif
					</div>
				  
				  
					<div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
						<label>Discount </label>
						<div class="row">
							<div class="col-xs-6">
								<input name="discount" type="text"  class="form-control" autocomplete="off" placeholder="enter discount" >
							</div>
						</div>
						@if ($errors->has('discount'))
						<span class="help-block">
							 <strong>{{ $errors->first('discount') }}</strong>
						</span>
						@endif
					</div>
					
					
					<div class="form-group{{ $errors->has('minimum_order') ? ' has-error' : '' }}">
						<label>Minimum Order Price</label>
						<div class="row">
							<div class="col-xs-6">
								<input name="minimum_order" type="text"  class="form-control" autocomplete="off" placeholder="enter Minimum Order" >
							</div>
						</div>
						@if ($errors->has('minimum_order'))
							<span class="help-block">
								<strong>{{ $errors->first('minimum_order') }}</strong>
							</span>
						@endif
					</div>
				  
					<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }} ">
						<label>Select Category</label>
						<div class="row">
						<div class="col-xs-6">
						<select class="form-control" name="category" id="category_id" >
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
					
					<div class="form-group{{ $errors->has('validfrom') ? ' has-error' : '' }}">
						<label>Valid From:</label>
						<div class="row">
							<div class="col-xs-6">
							  <div class='input-group date' >
								  <input type='text' name="validfrom" class="form-control" id='datepicker' autocomplete="off" placeholder="Valid Date:"/>
								  <span class="input-group-addon">
									  <span class="glyphicon glyphicon-calendar"></span>
								  </span>
							  </div>
							</div>
						<!-- /.input group -->
						</div>
						@if ($errors->has('validfrom'))
						<span class="help-block">
							<strong>{{ $errors->first('validfrom') }}</strong>
						</span>
						@endif
					  <!-- /.form group -->
					</div>
				  
					<div class="form-group{{ $errors->has('validto') ? ' has-error' : '' }}">
						<label>Valid To:</label>
						<div class="row">
							 <div class="col-xs-6">
								<div class='input-group date' >
								  <input type='text' name="validto" class="form-control" id='datepicker1' autocomplete="off" placeholder="End Date:"/>
								  <span class="input-group-addon">
									  <span class="glyphicon glyphicon-calendar"></span>
								  </span>
							  </div>
						   </div><!-- col group-->
						   <!-- /row-->
						</div>
						@if ($errors->has('validto'))
						<span class="help-block">
							<strong>{{ $errors->first('validto') }}</strong>
						</span>
						@endif
						<!-- /.form group -->
					</div>
					
					<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
						<label for="exampleInputreason1">Description</label>
							<div class="row">
								<div class="col-xs-6">
									<textarea rows="4" cols="50" class="form-control input_width" id="reviewComment" name="description"  placeholder="description"></textarea>
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
						  <select class="form-control" name="status" id="status" >
							<option value="1">active</option>
							<option value="0">Inactive</option>                  
						  </select>
						  @if ($errors->has('status'))
							<span class="help-block">
								<strong>{{ $errors->first('status') }}</strong>
							</span>
						@endif
						</div>
						</div>
					</div>
					         
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</section>
	</section>
            

          </div>
	<script type="text/javascript">
		$(function() {
			CKEDITOR.replace('reviewComment');
			
			$(".textarea").wysihtml5();
		});
	
		$(function () {
			$(".Fromtimepicker").timepicker({
			  showInputs: false
			});
			$(".Totimepicker").timepicker({
			  showInputs: false
			});
		});
	  
		$(function () {
			$('#datepicker').datepicker({
			autoclose: true
			});
			$('#datepicker1').datepicker({
				autoclose: true
			});
		});
	</script>  
  
@endsection
