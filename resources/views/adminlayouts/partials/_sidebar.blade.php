<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				@php 
				$profileImage=Auth::guard('admin')->user()->profile_picture;
				$path = '/uploads/admin/profile/image/'.Auth::guard('admin')->user()->profile_picture; 
				@endphp
					@if($profileImage)
					<img src="{{URL::asset($path) }}" class="user-image" alt="User Image">	
					@else
					<img src="{{ URL::asset('images/logo1.png') }}" class="user-image" alt="User Image">
				@endif
			</div>
			<div class="pull-left info">
				<p>{{Auth::guard('admin')->user()->fname}} {{Auth::guard('admin')->user()->lname}}</p>
				<a href="/admin/profile"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="/admin/home">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
        </li>
       
		<li class="treeview {{ (Request::path() == 'admin/customers' || Route::getCurrentRoute()->getName() == 'admin.customers.show' || Request::path() == 'admin/edit-user') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-folder"></i> <span>User Managements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li class="{{ Request::path() == 'admin/customers' ? 'active' : '' }}"><a href="{{ route('admin.customers') }}"><i class="fa fa-circle-o"></i>User list</a></li>
                               
          </ul>
        </li>

       <li class="treeview {{ Request::path() == 'admin/order-list' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Manage Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::path() == 'admin/order-list' ? 'active' : '' }}"><a href="/admin/order-list"><i class="fa fa-circle-o"></i>Order list</a></li>                    
          </ul>
        </li> 
		
		 
        <li class="treeview {{ (Request::path() == 'admin/product-list' || Request::path() == 'admin/add-product' || Request::path() == 'admin/edit-product') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-folder"></i><span>Manage Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li class="{{ Request::path() == 'admin/product-list' ? 'active' : '' }}"><a href="/admin/product-list"><i class="fa fa-circle-o"></i>Product list</a></li>
            <li class="{{ Request::path() == 'admin/add-product' ? 'active' : '' }}"><a href="/admin/add-product"><i class="fa fa-circle-o"></i>Add Product</a></li>
			                    
          </ul>
        </li>
        
        <li class="treeview {{ (Request::path() == 'admin/category-list' || Request::path() == 'admin/add-category' || Request::path() == 'admin/edit-category' || Route::getCurrentRoute()->getName() == 'live.token'  || Route::getCurrentRoute()->getName() == 'clinic.show') ? 'active' : '' }}"">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Manage Product Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::path() == 'admin/category-list' || Route::getCurrentRoute()->getName() == 'live.token'  || Route::getCurrentRoute()->getName() == 'category.show' ? 'active' : '' }}"><a href="/admin/category-list"><i class="fa fa-circle-o"></i>Category List</a></li>
            <li class="{{ Request::path() == 'admin/add-category' ? 'active' : '' }}"><a href="/admin/add-category"><i class="fa fa-circle-o"></i>Add Category</a></li>        
          </ul>
        </li>
		
		<li class="treeview {{ (Request::path() == 'admin/review-list' || Request::path() == 'admin/add-review' || Request::path() == 'admin/edit-review' || Route::getCurrentRoute()->getName() == 'live.token'  || Route::getCurrentRoute()->getName() == 'clinic.show') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Review Managements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::path() == 'admin/review-list' || Route::getCurrentRoute()->getName() == 'live.token'  || Route::getCurrentRoute()->getName() == 'review.show' ? 'active' : '' }}"><a href="/admin/review-list"><i class="fa fa-circle-o"></i>Review List</a></li>
            <li class="{{ Request::path() == 'admin/add-review' ? 'active' : '' }}"><a href="/admin/add-review"><i class="fa fa-circle-o"></i>Add Review</a></li>        
          </ul>
        </li>
		
		<li class="treeview {{ (Request::path() == 'admin/coupan-list' || Request::path() == 'admin/add-coupan' || Request::path() == 'admin/edit-coupan' || Route::getCurrentRoute()->getName() == 'live.token'  || Route::getCurrentRoute()->getName() == 'coupan.show') ? 'active' : '' }}">
			<a href="#">
            <i class="fa fa-folder"></i> <span>Manage Discount And Offers</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li class="{{ Request::path() == 'admin/coupan-list' || Route::getCurrentRoute()->getName() == 'live.token'  || Route::getCurrentRoute()->getName() == 'coupan.show' ? 'active' : '' }}"><a href="/admin/coupan-list"><i class="fa fa-circle-o"></i>Discount And Offers List</a></li>
				<li class="{{ Request::path() == 'admin/add-coupan' ? 'active' : '' }}"><a href="/admin/add-coupan"><i class="fa fa-circle-o"></i>Add Discount And Offers</a></li>        
			</ul>
        </li>
		

        <li class="treeview {{ Request::path() == 'admin/wishlist' || Request::path() == 'admin/wishlist' ? 'active' : '' }}">
			<a href="#">
				<i class="fa fa-folder"></i> <span>WishList Management</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li class="{{ Request::path() == 'admin/wishlist' ? 'active' : '' }}"><a href="wishlist"><i class="fa fa-circle-o"></i>Wish-List</a></li>
			</ul>
        </li>
		
		<li class="treeview {{ (Request::segment(2) === 'add-cms-page' || Request::segment(2) === 'manage-cms-page') ? 'active' : null }}">
			<a href="#">
				<i class="ion ion-clipboard"></i> <span>{{Config::get('settings.cms')}}Content Management</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li class="{{ Request::segment(2) === 'manage-cms-page' ? 'active' : null }}"><a href="{{route('manage-cms-page')}}"><i class="fa fa-circle-o"></i> Manage {{Config::get('settings.cms')}} page</a></li>
				<li class="{{ Request::segment(2) === 'add-cms-page' ? 'active' : null }}"><a href="{{route('add-cms-page')}}"><i class="fa fa-circle-o"></i> Add {{Config::get('settings.cms')}} page</a></li>            
			</ul>
        </li>
       
       
       <!--
        <li class="treeview">
			<a href="#">
				<i class="fa fa-folder"></i> <span>Report Management</span>
            <span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
            </span>
			</a>
			<ul class="treeview-menu">
				<li><a href="#"><i class="fa fa-circle-o"></i>List Reports</a></li>
				<li><a href="#"><i class="fa fa-circle-o"></i> Add Report</a></li>
                       
			</ul>
        </li>
		
		

        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Notification Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> List Notifications</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Add Notification</a></li>
                      
          </ul>
        </li>    
        <li class="treeview {{ (Request::path() == 'admin/blog-list' || Request::path() == 'admin/add-blog' || Request::path() == 'admin/edit-blog') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Blog Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::path() == 'admin/blog-list' ? 'active' : '' }}"><a href="#"><i class="fa fa-circle-o"></i>Blog list</a></li>
            <li class="{{ Request::path() == 'admin/add-blog' ? 'active' : '' }}"><a href="#"><i class="fa fa-circle-o"></i>Add Blog</a></li>                       
          </ul>
        </li>-->
		
		<li class="treeview">
			<a href="#">
				<i class="fa fa-folder"></i> <span>Setting</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="{{ route('admin.change-password') }}"><i class="fa fa-circle-o"></i>Reset Password</a></li>
				<li><a href="{{ route('admin.profile') }}"><i class="fa fa-circle-o"></i>Update Profile</a></li>
			</ul>
        </li> 
    </ul>

    </section>
    <!-- /.sidebar -->
  </aside>
