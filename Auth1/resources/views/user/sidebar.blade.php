<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PPMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/img/AdminLTELogo.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">PPMS</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div><div class="sidebar-search-results"><div class="list-group"><a href="#" class="list-group-item"><div class="search-title"><strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong class="text-light"></strong> <strong class="text-light"></strong>e<strong class="text-light"></strong>l<strong class="text-light"></strong>e<strong class="text-light"></strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong> <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong class="text-light"></strong>u<strong class="text-light"></strong>n<strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong></div><div class="search-path"></div></a></div></div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="/admin/pages/home" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/pages/contact" class="nav-link ">
            <i class="nav-icon fas fa-id-card-alt"></i>
              <p>
                Contact us
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Offices
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item">
                <a href="{{ url('admin/pages/PUnit/index') }}" class="nav-link ">
                  <i class="fas fa-angle-right"></i>
                  <p>PUnit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/pages/institute/index') }}" class="nav-link">
                <i class="fas fa-angle-right"></i>
                  <p>Institute</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/pages/college/index') }}" class="nav-link">
                <i class="fas fa-angle-right"></i>
                  <p>College</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/pages/department/index') }}" class="nav-link">
                <i class="fas fa-angle-right"></i>
                  <p>Department</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('admin/pages/role/index') }}" class="nav-link">
                    <i class="fas fa-angle-right"></i>
                      <p>Role</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/pages/assignrole/index') }}" class="nav-link">
                    <i class="fas fa-angle-right"></i>
                      <p>Assign Role</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/pages/educationlevel/index') }}" class="nav-link">
                    <i class="fas fa-angle-right"></i>
                      <p>Education level</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/pages/academictitle/index') }}" class="nav-link">
                    <i class="fas fa-angle-right"></i>
                      <p>Academic title</p>
                    </a>
                  </li>
              <li class="nav-item">
                <a href="{{ url('admin/pages/user/index') }}" class="nav-link ">
                  <i class="fas fa-angle-right"></i>
                  <p>User</p>
                </a>
              </li>


            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
