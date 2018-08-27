@extends('adminlayouts.master')

@section('content')
<!-- Default box -->
	<section class="content-header">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Edit Discount and Offers</li>
		</ol>
    </section>
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Edit Discount and Offers</h3>
</div>
<!-- /.box-header -->
@include('adminlayouts.message')
<section class="content"> 
	<section class="content"> 
		<form role="form" action="{{ route('admin.coupon.update') }}" method="post"  enctype="multipart/form-data">
		<input type="hidden" name="couponId" value="{{$coupon->coupon_id}}">
			  {{ csrf_field() }}
			  
			
			<div class="box-body">
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					<label>Name </label>
					<div class="row">
						<div class="col-xs-6">
							<input name="name" type="text"  class="form-control" placeholder="enter name" value="{{ $coupon->name }}" required>
						</div>
					</div>
					@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif
				</div>
			   
			  
				<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
				  <label>Code </label>
					<div class="row">
						<div class="col-xs-6">
							<input name="code" type="text" value="{{ $coupon->coupon_code }}" class="form-control" placeholder="enter code" required>
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
							<input name="discount" type="text" value="{{ $coupon->discount }}" class="form-control" placeholder="enter discount" required>
						</div>
					</div>
					@if ($errors->has('discount'))
						<span class="help-block">
							<strong>{{ $errors->first('discount') }}</strong>
						</span>
					@endif
				</div>
				
				<div class="form-group{{ $errors->has('minimum_order') ? ' has-error' : '' }}">
					<label>Minimum Order </label>
					<div class="row">
							<div class="col-xs-6">
								<input name="minimum_order" type="text" value="{{ $coupon->amount_limit }}" class="form-control" placeholder="enter Minimum Order" required>
							</div>
					</div>
					  @if ($errors->has('minimum_order'))
										<span class="help-block">
						  <strong>{{ $errors->first('minimum_order') }}</strong>
					  </span>
					  @endif
				</div>
			  
				<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
					<label>Category</label>
					<div class="row">
						<input type="hidden" id="cat_id" value='{{$coupon->category_id}}'>
						<div class="col-xs-6">
							<select  class="form-control single " name="category" id="category_id" data-bind="category" >
								@if(!empty($categories)) 
									@foreach($categories as $ct)								
										<option value="{{$ct->category_id}}" @if($coupon->category_id == $ct->category_id) selected @endif  >{{$ct->name}}</option>
									@endforeach
								@endif
							</select>
						</div>
					</div>
				</div>
			  
				
				<div class="form-group{{ $errors->has('validfrom') ? ' has-error' : '' }}">
					<label>Valid From:</label>
						<div class="row">
							<div class="col-xs-6">
							  <div class='input-group date' >
								  <input type='text' name="validfrom" value="{{ $coupon->valid_from }}" autocomplete="off" class="form-control" id='datepicker'/>
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
								<input type='text' name="validto" value="{{ $coupon->valid_to }}" autocomplete="off" class="form-control" id='datepicker1'/>
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
								<textarea rows="4" cols="50" class="form-control input_width" id="ckEditer" name="description"  placeholder="description">{!! $coupon->description !!}</textarea>
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
								<option value="1" {{ ($coupon->status == 1) ? 'selected=selected' : '' }}>active</option>
								<option value="0" {{ ($coupon->status == 0) ? 'selected=selected' : '' }}>Inactive</option>                  
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
			<!-- /.box-body -->
			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</section>
</section>
<script type="text/javascript">

$(function() {
	CKEDITOR.replace('ckEditer');
	
	$(".textarea").wysihtml5();
});



$(function () {
//Timepicker
$(".Fromtimepicker").timepicker({
  showInputs: false
});

//Timepicker
$(".Totimepicker").timepicker({
  showInputs: false
});
});  
</script> 
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
@endsection
