      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="{{route('admin')}}" class="logo">
              <img
                src="{{ asset('assets/img/logo/logo-kalapatec.png') }}"
                alt="navbar brand"
                class="navbar-brand"
                height="50"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
                <a
                  href="{{ route(name: 'admin') }}"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <!-- Start Configuration Section -->
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Configuration</h4>
              </li>
              
              @if (Auth::user()->hasAnyRole(['administrator']))
              <li class="nav-item {{ request()->is('admin/user-management') ? 'active' : '' }}">
                <a href="{{ route(name: 'user-management') }}">
                  <i class="fas fa-user"></i>
                  <p>User Management</p>
                </a>
              </li>
              @endif

              <li class="nav-item {{ request()->is('admin/category') ? 'active' : '' }}">
                <a href="{{ route(name: 'category.index') }}">
                  <i class="fas fa-book"></i>
                  <p>Category Management</p>
                </a>
              </li>

             
              <!-- End Configuration Section -->

              <!-- Start Request Section -->
               <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Request</h4>
              </li>

              <li class="nav-item {{ request()->is('admin/demo-trial') ? 'active' : '' }}">
                <a href="{{ route(name: 'demo-trial.index') }}">
                  <i class="fas fa-envelope"></i>
                  <p>Demo/Trial</p>
                </a>
              </li> 
              <!-- End Request Section -->

              <!-- Start Pages Kalapatec Section -->
              <li class="nav-item {{ request()->is('admin/career') ? 'active' : '' }}">
                <a href="{{ route(name: 'career.index') }}">
                  <i class="fas fa-briefcase"></i>
                  <p>Career</p>
                </a>
              </li> 

              <li class="nav-item {{ request()->is('admin/post') ? 'active' : '' }}">
                <a href="{{ route(name: 'post.index') }}">
                  <i class="fas fa-newspaper"></i>
                  <p>Blog</p>
                </a>
              </li> 

              <!-- End Pages Kalapatec Section -->
            </ul>
          </div>
        </div>
      </div>