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
			<h3 class="box-title">Edit Color</h3>
		</div>
        <!-- /.box-header -->
        @include('adminlayouts.message')
	
		<section class="content"> 
			<form role="form" action="{{route('editColorProcess')}}" method="post"  enctype="multipart/form-data">
				<input type="hidden" name="colorId" value="{{$Colors->color_id}}">
					{{ csrf_field() }}
					<div class="box-body">
						<div class="form-group{{ $errors->has('color_name') ? ' has-error' : '' }}">
							<label>Color Name</label>
							<div class="row">
								<div class="col-xs-6">
									<input name="color_name" value="{{$Colors->color_name}}" type="text"  class="form-control" value="{{$Colors->color_name}}" placeholder="color name " required>
								</div>
							</div>
						  @if ($errors->has('color_name'))
							<span class="help-block">
							  <strong>{{ $errors->first('color_name') }}</strong>
							</span>
						  @endif
						</div>
						
						<div class="form-group{{ $errors->has('color_code') ? ' has-error' : '' }}">
							<label>Color Code</label>
							<div class="row">
								<div class="col-xs-6">
									<input name="color_code" value="{{$Colors->color_code}}" type="text"  class="form-control" value="{{$Colors->color_code}}" placeholder="color code " required>
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
									<select class="form-control" name="status" id="status" >
										<option value="1" {{ ($Colors->status == 1) ? 'selected=selected' : '' }}>active</option>
										<option value="0" {{ ($Colors->status == 0) ? 'selected=selected' : '' }}>Inactive</option>                  
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
    </div>
	   
@endsection
