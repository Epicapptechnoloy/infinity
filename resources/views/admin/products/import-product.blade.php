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
			<li class="active">Import Product</li>
		</ol>
    </section>
	
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Import Product</h3>
			@if (session('success'))
			<div class="flash-message">
			<div class="alert alert-success">
			<p> {{session('success')}} </p>
			</div>
			</div>
		@endif
		@if (session('error'))
			<div class="flash-message">
			<div class="alert alert-danger">
			{{session('error')}}
			</div>
			</div>
		@endif
        </div>
        <!-- /.box-header -->
       
		<section class="content"> 
			<section class="content"> 
				<form role="form" action="{{route('importProductProcess')}}" method="post"  enctype="multipart/form-data">
						  {{ csrf_field() }}
					<div class="box-body">
						
						<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
							<input type="file" name="file" id="fileToUpload" class = 'btn btn-default btn-file'  required>
						</div>
						@if ($errors->has('file'))
						<span class="help-block">
							<strong>{{ $errors->first('file') }}</strong>
						</span>
						@endif
						
					</div>
						  <!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Upload</button>
					</div>
				</form>
			</section>
		</section>
	</div>
   
@endsection
