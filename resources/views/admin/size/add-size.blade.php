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
			<li class="active">Add Size</li>
		</ol>
    </section>
	<div class="box">
		<div class="box-header with-border">
		  <h3 class="box-title">Add New Size</h3>
		</div>
		<!-- /.box-header -->
		@include('adminlayouts.message')
		<section class="content"> 
			
			<form role="form" action="{{route('addSizeProcess')}}" method="post"  id="AddSize"  enctype="multipart/form-data">
				  {{ csrf_field() }}
				<div class="box-body">
				
					<div class="form-group{{ $errors->has('size_name') ? ' has-error' : '' }}">
						<label>Size Name</label>
						<div class="row">
							<div class="col-xs-6">
								<input name="size_name" type="text"  class="form-control" value="{{ old('size_name') }}" placeholder="Size Name" required>
							</div>
						</div>
					  @if ($errors->has('size_name'))
						<span class="help-block">
						  <strong>{{ $errors->first('size_name') }}</strong>
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
	<script type="text/javascript">
		$(function() {
			CKEDITOR.replace('bannerText');
			
			$(".textarea").wysihtml5();
		});
	</script>    
@endsection
