<?php
    $url = explode('/',url('/'));
    $url = $url[0]."//".$url[1].$url[2].'/drinkapp_mobile/public/uploads/';
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
          <img src="@if(Auth::user()->profile_picture){{ $url }}/{{ Auth::user()->profile_picture }} @else {{ asset('img') }}/sample.jpg @endif" class="img-circle elevation-2" alt="Waiter Image">
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
            <a href="{{ url('waiter') }}" class="nav-link @if(Request::segment(1) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-th text-orange"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Core</li>
          <li class="nav-item">
            <a href="{{ url('waiter/orders') }}" class="nav-link @if(Request::segment(2) == 'orders' && Request::segment(3) != 'ledger') active @endif">
              <i class="nav-icon fas fa-shopping-cart fa-circle text-orange"></i>
              <p>
                Orders
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{ url('waiter/orders/ledger') }}" class="nav-link @if(Request::segment(2) == 'orders' && Request::segment(3) == 'ledger') active @endif">
              <i class="nav-icon fas fa-shopping-cart fa-circle text-orange"></i>
              <p>
                Ledger
              </p>
            </a>
          </li>
          <!--<li class="nav-item">-->
          <!--  <a href="{{ url('waiter/tables') }}" class="nav-link @if(Request::segment(2) == 'tables') active @endif">-->
          <!--    <i class="nav-icon fas fa-hamburger fa-circle text-orange"></i>-->
          <!--    <p>-->
          <!--      Tables-->
          <!--    </p>-->
          <!--  </a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="{{ url('waiter/reservations') }}" class="nav-link @if(Request::segment(2) == 'reservations') active @endif">-->
          <!--    <i class="nav-icon fas fa-door-closed fa-circle text-orange"></i>-->
          <!--    <p>-->
          <!--      Reservations-->
          <!--    </p>-->
          <!--  </a>-->
          <!--</li>-->
          <li class="nav-header">Extra</li>
          <li class="nav-item">
            <a href="{{ url('waiter/profile/show') }}" class="nav-link @if(Request::segment(2) == 'profile') active @endif">
              <i class="nav-icon far fa-id-badge text-orange"></i>
              <p>Profile Settings</p>
            </a>
          </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>