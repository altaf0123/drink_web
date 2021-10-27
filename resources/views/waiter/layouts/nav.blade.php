
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
            <?php 
                $notification = get_list('waiter_orders',array("waiter_orders.waiter_id"=> Auth::user()->id, "orders.is_seen"=>0),"","","","","orders",
                array('orders.id'=>'waiter_orders.order_id'),"inner");  
            ?>
          <span class="badge badge-<?php echo count($notification) == 0 ? 'success' : 'danger'; ?> navbar-badge"><?php echo count($notification); ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php foreach($notification as $rec): ?>
          <a href="<?php echo url('waiter/orders/view/'); ?>/<?php echo $rec->id; ?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <!--<img src="<?php //echo url('assets/uploads/profile'); ?>/<?php //echo get_name_by_id('users','profile_picture', array('id'=>$rec->user_id)); ?>"-->
              <!--alt="User Avatar" class="img-circle" width="60" height="60" >-->
              
              <div class="media-body ml-3">
                <h3 class="dropdown-item-title">
                  You have got Order # <?php echo $rec->id; ?>
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm"></p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 
                    <?php

                        $to_time = strtotime($rec->created_at);
                        $from_time = strtotime(date("Y-m-d h:i:sa"));
                        $diff = ($from_time - $to_time) / ( 60 * 60 );

                        echo round(abs($diff),2). " hours ago";
                     
                    ?>
                </p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <?php endforeach; ?>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">0 Notification</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> -->
      <li class="nav-item">
        <!-- <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a> -->
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
            </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  