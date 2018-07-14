@extends('adminlayouts.master')
@section('content')
<!-- Default box -->
<section class="content-header">
      <h1>
        Admin Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Admin</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>
	<div class="row"> <!-- /.row -->
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-primary">
				            
				<div class="box-header with-border">
					
					<h3 class="box-title">Update Password</h3>
				</div>
				 @include('adminlayouts.message')
					<form method="POST" action="{{ route('admin.save-password') }}" accept-charset="UTF-8" id="addForm"><input name="_token" type="hidden" value="PbpiaOfHuyyl1CH73QZ0ryHAYp5Bri2X2UzhERZd"> 
					
					{{ csrf_field() }}
					<div class="box-body">
						<div class="input-group">
							<span class="input-group-addon">Password</span>
							<input class="form-control required" placeholder="Current Password" name="current_password" type="password" value="">
						</div>
						<div class="input-group">
							<span class="input-group-addon">New password  </span>
							 <input class="form-control alphanumeric required" placeholder="New Password" id="password" name="password" type="password" value="">
						</div>
						<div class="input-group">
							<span class="input-group-addon">Confirm Password</span>
						 <input class="form-control alphanumeric required" placeholder="Confirm Password" name="password_confirm" type="password" value="">
					   </div>
					</div>
					<div class="box-footer">
						<button class="btn btn-primary" type="submit">Submit</button>
					</div>
					</form>
			  
  
			</div>
		</div>
	</div>
<!-- /.row -->
     
@endsection
