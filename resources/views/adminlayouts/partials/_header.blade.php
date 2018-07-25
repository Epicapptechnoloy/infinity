<header class="main-header">
    <!-- Logo -->
    <a href="/admin/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Infinity</b>Application</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Infinity </b>Application</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
      
	<div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
         
         
          <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				@php 
				$profileImage=Auth::guard('admin')->user()->profile_picture;
				$path = '/uploads/admin/profile/image/'.Auth::guard('admin')->user()->profile_picture; 
				@endphp
					@if($profileImage)
					<img src="{{URL::asset($path) }}" class="user-image img-circle" alt="User Image">	
					@else
					<img src="{{ URL::asset('images/logo1.png') }}" class="user-image img-circle" alt="User Image">
				@endif
					<span class="hidden-xs">{{Auth::guard('admin')->user()->fname}} {{Auth::guard('admin')->user()->lname}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
				<li class="user-header">
					@php 
					$profileImage=Auth::guard('admin')->user()->profile_picture;
					$path = '/uploads/admin/profile/image/'.Auth::guard('admin')->user()->profile_picture; 
					@endphp
					@if($profileImage)
					<img src="{{URL::asset($path) }}" class="img-circle" alt="User Image">	
					@else
					<img src="{{ URL::asset('images/logo1.png') }}" class="img-circle" alt="User Image">
					@endif
					<p>
						{{Auth::guard('admin')->user()->fname}} {{Auth::guard('admin')->user()->lname}}
						<small>Member since {{Auth::guard('admin')->user()->created_at->format('F Y ')}} </small>
					</p>
				</li>
				  <!-- Menu Footer-->
				<li class="user-footer">
					<div class="pull-left">
						<a href="{{Route('admin.profile')}}" class="btn btn-default btn-flat">Profile</a>
					</div>
					<div class="pull-right">
						<a href="{{Route('admin.logout')}}" class="btn btn-default btn-flat">Sign out</a>
					</div>
				</li>
            </ul>
        </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
    </div>
    </nav>

  </header>
