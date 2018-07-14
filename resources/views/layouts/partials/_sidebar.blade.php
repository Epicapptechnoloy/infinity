<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          
                <img src="/timthumb.php?src={{ URL::asset('images/no-image-icon-md.png') }}&h=160&w=160&q=90" class="user-image" alt="User Image">

          
        </div>
        <div class="pull-left info">
          <p>Dr.  {{Auth::guard('admin')->user()->fname}} {{Auth::guard('admin')->user()->lname}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="/admin/home">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
        </li>
       
        <li class="treeview {{ Request::path() == 'admin/customers' || Route::getCurrentRoute()->getName() == 'customers.show' ? 'active' : '' }}">
          <a href="{{ route('customers') }}">
            <i class="fa fa-folder"></i> <span>Customers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li> 

        <li class="treeview {{ Request::path() == 'doctor/appointment-list' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Manage Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::path() == 'doctor/appointment-list' ? 'active' : '' }}"><a href="/doctor/appointment-list"><i class="fa fa-circle-o"></i>Order list</a></li>                    
          </ul>
        </li> 

         <li class="treeview {{ (Request::path() == 'doctor/schedule-list' || Request::path() == 'doctor/add-schedule' || Request::path() == 'doctor/edit-schedule') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Manage Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::path() == 'doctor/schedule-list' ? 'active' : '' }}"><a href="/doctor/schedule-list"><i class="fa fa-circle-o"></i>Product list</a></li>
            <li class="{{ Request::path() == 'doctor/add-schedule' ? 'active' : '' }}"><a href="/doctor/add-schedule"><i class="fa fa-circle-o"></i>Add Product</a></li>
	<li class="{{ Request::path() == 'doctor/add-schedule' ? 'active' : '' }}"><a href="/doctor/add-schedule"><i class="fa fa-circle-o"></i>Product Attribute</a></li>                       
          </ul>
        </li>
       
        <li class="treeview {{ (Request::path() == 'doctor/clinic-list' || Request::path() == 'doctor/add-clinic' || Request::path() == 'doctor/edit-clinic' || Route::getCurrentRoute()->getName() == 'live.token'  || Route::getCurrentRoute()->getName() == 'clinic.show') ? 'active' : '' }}"">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Manage Product Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::path() == 'doctor/clinic-list' || Route::getCurrentRoute()->getName() == 'live.token'  || Route::getCurrentRoute()->getName() == 'clinic.show' ? 'active' : '' }}"><a href="/doctor/clinic-list"><i class="fa fa-circle-o"></i>Category List</a></li>
            <li class="{{ Request::path() == 'doctor/add-clinic' ? 'active' : '' }}"><a href="/doctor/add-clinic"><i class="fa fa-circle-o"></i>Add Category</a></li>        
          </ul>
        </li>
       
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
        <li class="treeview {{ (Request::path() == 'doctor/blog-list' || Request::path() == 'doctor/add-blog' || Request::path() == 'doctor/edit-blog') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Blog Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::path() == 'doctor/blog-list' ? 'active' : '' }}"><a href="/doctor/blog-list"><i class="fa fa-circle-o"></i>Blog list</a></li>
            <li class="{{ Request::path() == 'doctor/add-blog' ? 'active' : '' }}"><a href="/doctor/add-blog"><i class="fa fa-circle-o"></i>Add Blog</a></li>                       
          </ul>
        </li>
		

        <li class="treeview {{ Request::path() == 'doctor/event-list' || Request::path() == 'doctor/add-event' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Event Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		  <li class="{{ Request::path() == 'doctor/event-list' ? 'active' : '' }}"><a href="/doctor/event-list"><i class="fa fa-circle-o"></i>Events List</a></li>
          <li class="{{ Request::path() == 'doctor/add-event' ? 'active' : '' }}"><a href="/doctor/add-event"><i class="fa fa-circle-o"></i>Add Event</a></li>        
                        
          </ul>
        </li>
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>
