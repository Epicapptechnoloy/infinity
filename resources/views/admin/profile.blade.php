@extends('adminlayouts.master')

@section('content')
<!-- Default box -->
	<section class="content-header">
		<h1>
			Profile
		</h1>
		<ol class="breadcrumb">
			<li><a href="/admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">admin</a></li>
			<li class="active">Profile</li>
		</ol>
    </section>
    <div class="row">
		<div class="col-md-3">
          <!-- Profile Image -->
			<div class="box box-primary">
				<div class="box-body box-profile"> 
				
				@if(Auth::guard('admin')->user()->profile_picture == NULL)      
					<img src="/timthumb.php?src={{ URL::asset('images/logo1.png') }}&h=160&w=160&q=90" class="profile-user-img img-responsive img-circle" alt="profile picture">               
				@else
					@php
						$path = '/uploads/admin/profile/image/'.Auth::guard('admin')->user()->profile_picture ;  
					@endphp
					<img class="profile-user-img img-responsive img-circle" alt="profile picture" src="{{asset($path)}}"/>              
				@endif             
				</div>
				<!-- /.box-body -->
			</div>
			  <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
          
            <div class="tab-content">
              @include('adminlayouts.message')
             
                <form class="form-horizontal" method="POST" action="{{ route('admin.update-profile') }}"  enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="inputfName" class="col-sm-2 control-label">First Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputfName" placeholder="First Name" name="fname" value="{{ $admin[0]->fname }}">
						</div>
					</div>
					  
					<div class="form-group">
						<label for="inputlName" class="col-sm-2 control-label">Last Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputlName" placeholder="Last Name" name="lname" value="{{ $admin[0]->lname }}">
						</div>
					</div>
					
					<div class="form-group">
						<label for="inputEmail" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
						  <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ $admin[0]->email }}">
						</div>
					</div>
					 
					<div class="form-group">
						<label for="inputSkills" class="col-sm-2 control-label">Mobile No.</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="number" placeholder="mobile number" name="number" value="{{ $admin[0]->telephone }}">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="file" name="images" id="fileToUpload" class = 'btn btn-default btn-file'>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="submit" class="btn btn-danger">Submit</button>
						</div>
					</div>
                </form>
           
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
      </div>
      <!-- /.row -->
    </div>
@endsection
