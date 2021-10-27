@section('sidebar')
<?php
    $url = explode('/',url('/'));
    $url = $url[0]."//".$url[1].$url[2].'/drinkapp_mobile/public/uploads';
?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-navy elevation-4">
    <!-- Brand Logo -->
    <div class="text-center">
      <img src="{{ asset('assets/img') }}/logo.png" alt="Drink App" class="brand-image"
           style="opacity: .8;margin-top:15px;" width="200">
    </div>
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="@if(Auth::user()->profile_picture){{ $url }}/{{ Auth::user()->profile_picture }} @else {{ asset('img') }}/sample.jpg @endif" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('admin') }}" class="nav-link @if(Request::segment(1) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-th text-orange"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Core</li>
            <li class="nav-item">
                <a href="{{ url('admin/orders') }}" class="nav-link @if(Request::segment(2) == 'orders') active @endif">
                  <i class="nav-icon fas fa-shopping-cart fa-circle text-orange"></i>
                  <p>
                    Orders
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/invoices') }}" class="nav-link @if(Request::segment(2) == 'invoices') active @endif">
                  <i class="nav-icon fas fa-file-invoice text-orange"></i>
                  <p>
                    Invoices
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/products') }}" class="nav-link @if(Request::segment(2) == 'products') active @endif">
                  <i class="nav-icon fas fa-dolly fa-circle text-orange"></i>
                  <p>
                  Products
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/categories') }}" class="nav-link @if(Request::segment(2) == 'categories') active @endif">
                  <i class="nav-icon fas fa-type fa-circle text-orange"></i>
                  <p>
                  Categories
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/tables') }}" class="nav-link @if(Request::segment(2) == 'tables') active @endif">
                  <i class="nav-icon fas fa-hamburger fa-circle text-orange"></i>
                  <p>
                    Tables
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/deals') }}" class="nav-link @if(Request::segment(2) == 'deals') active @endif">
                  <i class="nav-icon fas fa-hamburger fa-circle text-orange"></i>
                  <p>
                    Deals
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/waiters') }}" class="nav-link @if(Request::segment(2) == 'waiters') active @endif">
                  <i class="nav-icon fas fa-serve fa-circle text-orange"></i>
                  <p>
                    Waiters 
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/managers') }}" class="nav-link @if(Request::segment(2) == 'managers') active @endif">
                  <i class="nav-icon fas fa-serve fa-circle text-orange"></i>
                  <p>
                    Managers 
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/reservations') }}" class="nav-link @if(Request::segment(2) == 'reservations') active @endif">
                  <i class="nav-icon fas fa-door-closed fa-circle text-orange"></i>
                  <p>
                    Reservations
                  </p>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) == 'restaurants') menu-open @endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-glass-martini-alt text-orange"></i>
              <p>
                Restaurant
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/restaurants/index') }}" class="nav-link @if(Request::segment(3) == 'index') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/restaurants/ledger') }}" class="nav-link @if(Request::segment(3) == 'ledger') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Restaurant Ledger</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/restaurants/ledgerUser') }}" class="nav-link @if(Request::segment(3) == 'ledgerUser') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Ledger</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/users') }}" class="nav-link @if(Request::segment(2) == 'users') active @endif">
              <i class="nav-icon fas fa-user text-orange"></i>
              <p>User Management</p>
            </a>
          </li>
          <li class="nav-header">Extra</li>
          <li class="nav-item">
            <a href="{{ url('admin/profile/show') }}" class="nav-link @if(Request::segment(2) == 'profile') active @endif">
              <i class="nav-icon far fa-id-badge text-orange"></i>
              <p>Profile Settings</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/reports/show') }}" class="nav-link @if(Request::segment(2) == 'reports') active @endif">
              <i class="nav-icon fas fa-file text-danger"></i>
              <p class="text">Reports</p>
            </a>
          </li>  
          <li class="nav-header">Content Management</li>
          <li class="nav-item">
            <a href="{{ url('admin/cms/show/terms') }}" class="nav-link @if(Request::segment(4) == 'terms') active @endif">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Terms</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/cms/show/privacy') }}" class="nav-link @if(Request::segment(4) == 'privacy') active @endif">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Privacy</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
@endsection