<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info" style="display: inline-block; padding: 5px 5px 5px 61px;">
          <a href="#" class="d-block"><span>Hellow! {{ Auth::user()->fname }}</span></a></a>
        </div>
      </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item menu-open ">
              <a href="{{ route('admin.dashboard') }}" class="nav-link {{(request()->route()->getName()=='admin.dashboard')?'active':''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</i>
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link 
             
              ">
                  <i class="fas fa-users"></i>
                  <p>Advance Setting<i class="right fas fa-angle-right"></i></p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('admin.profile') }}" class="nav-link {{(request()->route()->getName()=='admin.profile')?'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Profile</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('user.index') }}" class="nav-link {{(request()->route()->getName()=='user.index')?'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User List</p>
                  </a>
                </li>
              </ul>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>