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
			<li class="active">Manage Color</li>
		</ol>
    </section>
	<div class="box">
		<div class="box-header with-border">
		  <h3 class="box-title">Add New Color</h3>
		</div>
		<!-- /.box-header -->
		@include('adminlayouts.message')
		<section class="content"> 
			
			<form role="form" action="{{route('addColorProcess')}}" method="post"  id="AddColor"  enctype="multipart/form-data">
				  {{ csrf_field() }}
				<div class="box-body">
				
					<div class="form-group{{ $errors->has('color_name') ? ' has-error' : '' }}">
						<label>Color Name</label>
						<div class="row">
							<div class="col-xs-6">
								<input name="color_name" type="text"  class="form-control" value="{{ old('color_name') }}" placeholder="Color Name" required>
							</div>
						</div>
					  @if ($errors->has('color_name'))
						<span class="help-block">
						  <strong>{{ $errors->first('color_name') }}</strong>
						</span>
					  @endif
					</div>
					
					<div class="form-group{{ $errors->has('color_code') ? ' has-error' : '' }}">
						<label>Color Name</label>
						<div class="row">
							<div class="col-xs-6">
								<input name="color_code" type="text"  class="form-control" value="{{ old('color_code') }}" placeholder="color code" required>
							</div>
						</div>
					  @if ($errors->has('color_code'))
						<span class="help-block">
						  <strong>{{ $errors->first('color_code') }}</strong>
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
			  
				</div>
				  <!-- /.box-body -->

				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</section>
	</div>
	
@endsection
