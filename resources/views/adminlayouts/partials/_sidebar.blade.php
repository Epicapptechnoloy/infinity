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
				<img src="{{URL::asset($path) }}" class="user-image img-circle" alt="User Image">	
				@else
				<img src="{{ URL::asset('images/logo1.png') }}" class="user-image img-circle" alt="User Image">
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
		<li class="treeview {{ (Request::path() == 'admin/users' || Route::current()->getName() == 'admin.customer.show'  
			|| Route::current()->getName() == 'admin.customerOrder.orderList'  || Route::current()->getName() == 'admin.customer.view-order'  
			|| Route::current()->getName() == 'admin.customerWishlist.wishList'  || Route::current()->getName() == 'admin.customerCart.cartList' 
			|| Route::current()->getName() == 'admin.customerReview.reviewList'  || Route::current()->getName() == 'edit-customer'  
		) ? 'active' : '' }}">
            <a href="#">
				<i class="fa fa-folder"></i> <span>User Managements</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li class="{{ (Request::path() == 'admin/users' || Route::current()->getName() == 'admin.customer.show'  
				|| Route::current()->getName() == 'admin.customerOrder.orderList'  || Route::current()->getName() == 'admin.customer.view-order'  
				|| Route::current()->getName() == 'admin.customerWishlist.wishList'  || Route::current()->getName() == 'admin.customerCart.cartList' 
				|| Route::current()->getName() == 'admin.customerReview.reviewList'  || Route::current()->getName() == 'edit-customer' ) ? 'active' : '' }}"><a href="{{ route('admin.customers') }}"><i class="fa fa-circle-o"></i>User list</a></li>
			</ul>
        </li>

		<li class="treeview {{ (Request::path() == 'admin/order-list' || Route::current()->getName() == 'admin.order.view-order' || Route::current()->getName() == 'admin.order.invoice-no') ? 'active' : '' }}">
			<a href="#">
					<i class="fa fa-folder"></i> <span>Manage Orders</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li class="{{ (Request::path() == 'admin/order-list' || Route::current()->getName() == 'admin.order.view-order' || Route::current()->getName() == 'admin.order.invoice-no') ? 'active' : '' }}"><a href="/admin/order-list"><i class="fa fa-circle-o"></i>Order list</a></li>                    
			</ul>
        </li> 
		
		 
        <li class="treeview {{ (Request::path() == 'admin/product-list' || Request::path() == 'admin/add-product' || Route::current()->getName() == 'editProduct' || Route::current()->getName() == 'admin.view-product') ? 'active' : '' }}">
			<a href="#">
				<i class="fa fa-folder"></i><span>Manage Products</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li class="{{ (Request::path() == 'admin/product-list' || Route::current()->getName() == 'editProduct' || Route::current()->getName() == 'admin.view-product') ? 'active' : '' }}"><a href="/admin/product-list"><i class="fa fa-circle-o"></i>Product list</a></li>
				<li class="{{ Request::path() == 'admin/add-product' ? 'active' : '' }}"><a href="/admin/add-product"><i class="fa fa-circle-o"></i>Add Product</a></li>
			</ul>
        </li>
		
		<li class="treeview {{ (Request::path() == 'admin/import-product') ? 'active' : '' }}">
			<a href="#">
				<i class="fa fa-folder"></i> <span>Import Management</span>
				<span class="pull-right-container">
				  <i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li class="{{ Request::path() == 'admin/import-product' ? 'active' : '' }}"><a href="/admin/import-product"><i class="fa fa-circle-o"></i>Import Product</a></li>
			</ul>
        </li>
		
        <li class="treeview {{ (Request::path() == 'admin/category-list' || Route::current()->getName() == 'admin.category.edit') ? 'active' : '' }}">
			<a href="#">
				<i class="fa fa-folder"></i> <span>Manage Product Category</span>
				<span class="pull-right-container">
				  <i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li class="{{ (Request::path() == 'admin/category-list' || Route::current()->getName() == 'admin.category.edit') ? 'active' : '' }}"><a href="/admin/category-list"><i class="fa fa-circle-o"></i>Category List</a></li>
				<li class="{{ Request::path() == 'admin/add-category' ? 'active' : '' }}"><a href="/admin/add-category"><i class="fa fa-circle-o"></i>Add Category</a></li>        
			</ul>
        </li>
		
		<li class="treeview {{ (Request::path() == 'admin/review-list' || Route::current()->getName() == 'admin.edit.review' || Route::current()->getName() == 'admin.view.review') ? 'active' : '' }}">
			<a href="#">
				<i class="fa fa-folder"></i> <span>Review Managements</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li class="{{ (Request::path() == 'admin/review-list' || Route::current()->getName() == 'admin.edit.review' || Route::current()->getName() == 'admin.view.review') ? 'active' : '' }}"><a href="/admin/review-list"><i class="fa fa-circle-o"></i>Review List</a></li>
				<li class="{{ Request::path() == 'admin/add-review' ? 'active' : '' }}"><a href="/admin/add-review"><i class="fa fa-circle-o"></i>Add Review</a></li>        
			</ul>
        </li>
		
		<li class="treeview {{ (Request::path() == 'admin/coupan-list' || Route::current()->getName() == 'admin.coupan.show' || Route::current()->getName() == 'admin.coupan.edit') ? 'active' : '' }}">
			<a href="#">
            <i class="fa fa-folder"></i> <span>Manage Discount And Offers</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li class="{{ (Request::path() == 'admin/coupan-list' || Route::current()->getName() == 'admin.coupan.show' || Route::current()->getName() == 'admin.coupan.edit') ? 'active' : '' }}"><a href="/admin/coupan-list"><i class="fa fa-circle-o"></i>Discount And Offers List</a></li>
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
		
		<li class="treeview {{ (Request::path() === 'admin/manage-cms-page' || Request::path() === 'admin/add-cms-page' || Route::current()->getName() == 'edit-cms-page') ? 'active' : null }}">
			<a href="#">
				<i class="ion ion-clipboard"></i> <span>{{Config::get('settings.cms')}}Content Management</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li class="{{ (Request::path() === 'admin/manage-cms-page' || Route::current()->getName() == 'edit-cms-page') ? 'active' : null }}"><a href="{{route('manage-cms-page')}}"><i class="fa fa-circle-o"></i> Manage {{Config::get('settings.cms')}} page</a></li>
				<li class="{{ Request::path() === 'admin/add-cms-page' ? 'active' : null }}"><a href="{{route('add-cms-page')}}"><i class="fa fa-circle-o"></i> Add {{Config::get('settings.cms')}} page</a></li>            
			</ul>
        </li>
       
        <li class="treeview {{ (Request::path() == 'admin/banner-list' || Route::current()->getName() == 'admin.banner.edit') ? 'active' : '' }}">
			<a href="#">
				<i class="fa fa-folder"></i> <span>Baner Management</span>
				<span class="pull-right-container">
				  <i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li class="{{ (Request::path() == 'admin/banner-list' || Route::current()->getName() == 'admin.banner.edit') ? 'active' : '' }}"><a href="/admin/banner-list"><i class="fa fa-circle-o"></i>Banner list</a></li>
				<li class="{{ Request::path() == 'admin/add-banner' ? 'active' : '' }}"><a href="/admin/add-banner"><i class="fa fa-circle-o"></i>Add Banner</a></li>                       
			</ul>
        </li>
		
		<li class="treeview {{ (Request::path() == 'admin/change-password' || Request::path() == 'admin/profile') ? 'active' : '' }}">
			<a href="#">
				<i class="fa fa-folder"></i> <span>Setting</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li class="{{ (Request::path() == 'admin/change-password') ? 'active' : '' }}"><a href="{{ route('admin.change-password') }}"><i class="fa fa-circle-o"></i>Reset Password</a></li>
				<li class="{{ (Request::path() == 'admin/profile') ? 'active' : '' }}"><a href="{{ route('admin.profile') }}"><i class="fa fa-circle-o"></i>Update Profile</a></li>
			</ul>
        </li> 
    </ul>

    </section>
    <!-- /.sidebar -->
  </aside>
