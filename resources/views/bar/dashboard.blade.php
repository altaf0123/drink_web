@extends('layouts.adminapp')

@section('content')

  @include('bar.layouts.nav')
  
  @include('bar.layouts.sidebar')
<style>
#dotGreen {
  height: 10px;
  width: 10px;
  background-color: #28a745;
  border-radius: 50%;
  display: inline-block;
}
#dotBlue {
  height: 10px;
  width: 10px;
  background-color: #007bff;
  border-radius: 50%;
  display: inline-block;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
            <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Todays Invoice</span>
                <span class="info-box-number">
                  <?= $daysale; ?>
                  <!--<small>%</small>-->
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">This Month Invoice</span>
                <span class="info-box-number"><?= $monthsale ?? "0"; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Today Sales</span>
                <span class="info-box-number"><?= $daysale??"0"; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">This Month Sales</span>
                <span class="info-box-number"><?= $monthsale ?? "0"; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">My Products</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">Products Over Time</span>
                    <span></span>
                  </p>
                </div>

                <div class="position-relative mb-4">
                   <?php if(!empty($products)){ ?>
                  <canvas id="products-chart" height="200"></canvas>
                  <?php } else { ?>
                    <h2>No record found</h2>
                  <?php } ?>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-warning"></i> This year
                  </span>

                  <!--<span>-->
                  <!--  <i class="fas fa-square text-gray"></i> Last year-->
                  <!--</span>-->
                </div>
              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">My Waiter Stats</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-sm btn-tool">
                      <span id="dotGreen"></span><span> Active</span>
                  </a>
                  <a href="#" class="btn btn-sm btn-tool">
                      <span id="dotBlue"></span><span> Inactive</span>
                  </a>
                </div>
              </div>
              <div class="card-body">
              <div class="item html ">
                  <h2>{{ $active_user }}</h2>
                  <svg class="mysvg2" width="160" height="160" xmlns="http://www.w3.org/2000/svg" class="text-center">
                  <g>
                    <title>Layer 1</title>
                    <circle class="circle_animation" r="69.85699" cy="81" cx="81" stroke-width="8" stroke="#6fdb6f" fill="none"/>
                  </g>
                  </svg>
              </div>
              <div class="item css">
                  <h2>{{ $inactive_user }}</h2>
                  <svg class="mysvg1" width="160" height="160" xmlns="http://www.w3.org/2000/svg"  class="text-center">
                  <g>
                    <title>Layer 1</title>
                    <circle class="circle_animation" r="69.85699" cy="81" cx="81" stroke-width="8" stroke="#69aff4" fill="none"/>
                  </g>
                  </svg>
              </div>
                <!-- /.d-flex -->
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">My Sales</h3>
                  <a href="javascript:void(0);"></a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">Sales Over Time</span>
                    <span></span>
                  </p>
                  <!--<p class="ml-auto d-flex flex-column text-right">-->
                  <!--  <span class="text-success">-->
                  <!--    <i class="fas fa-arrow-up"></i> 33.1%-->
                  <!--  </span>-->
                  <!--  <span class="text-muted">Since last month</span>-->
                  <!--</p>-->
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-warning"></i> This year
                  </span>

                  <!--<span>-->
                  <!--  <i class="fas fa-square text-gray"></i> Last year-->
                  <!--</span>-->
                </div>
              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">My Table Stats</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-sm btn-tool">
                      <span id="dotGreen"></span><span> Active</span>
                  </a>
                  <a href="#" class="btn btn-sm btn-tool">
                      <span id="dotBlue"></span><span> Inactive</span>
                  </a>
                </div>
              </div>
              <div class="card-body">
              <div class="item html">
                  <h2>{{ $active }}</h2>
                  <svg class="mysvg2" width="160" height="160" xmlns="http://www.w3.org/2000/svg">
                  <g>
                    <title>Layer 1</title>
                    <circle class="circle_animation" r="69.85699" cy="81" cx="81" stroke-width="8" stroke="#6fdb6f" fill="none"/>
                  </g>
                  </svg>
              </div>
              <div class="item css">
                  <h2>{{ $inactive }}</h2>
                  <svg class="mysvg1" width="160" height="160" xmlns="http://www.w3.org/2000/svg">
                  <g>
                    <title>Layer 1</title>
                    <circle class="circle_animation" r="69.85699" cy="81" cx="81" stroke-width="8" stroke="#69aff4" fill="none"/>
                  </g>
                  </svg>
              </div>
                <!-- /.d-flex -->
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <!-- <aside class="control-sidebar control-sidebar-dark">
  </aside> -->
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('bar.layouts.footer');
</div>
<!-- ./wrapper -->
@section('page_js')
<?php 
    $jan=0;$feb=0;$mar=0;$apr=0;$may=0;$jun=0;$jul=0;$aug=0;$sept=0;$oct=0;$nov=0;$dec=0;
    foreach($orders as $order)
    {
        if($order->month == 1)
        {
            $jan = $order->total;
        }
        if($order->month == 2)
        {
            $feb = $order->total;
        }
        if($order->month == 3)
        {
            $mar = $order->total;
        }
        if($order->month == 4)
        {
            $apr = $order->total;
        }
        if($order->month == 5)
        {
            $may = $order->total;
        }
        if($order->month == 6)
        {
            $jun = $order->total;
        }
        if($order->month == 7)
        {
            $jul = $order->total;
        }
        if($order->month == 8)
        {
            $aug = $order->total;
        }
        if($order->month == 9)
        {
            $sept = $order->total;
        }
        if($order->month == 10)
        {
            $oct = $order->total;
        }
        if($order->month == 11)
        {
            $nov = $order->total;
        }
        if($order->month == 12)
        {
            $dec = $order->total;
        }
    }
    
    
?>
<?php 
    $janp=0;$febp=0;$marp=0;$aprp=0;$mayp=0;$junp=0;$julp=0;$augp=0;$septp=0;$octp=0;$novp=0;$decp=0;
    if(!empty($products)):
    foreach($products as $prod)
    {
        if($prod->month == 1)
        {
            $janp = $prod->total;
        }
        if($prod->month == 2)
        {
            $febp = $prod->total;
        }
        if($prod->month == 3)
        {
            $marp = $prod->total;
        }
        if($prod->month == 4)
        {
            $aprp = $prod->total;
        }
        if($prod->month == 5)
        {
            $mayp = $prod->total;
        }
        if($prod->month == 6)
        {
            $junp = $prod->total;
        }
        if($prod->month == 7)
        {
            $julp = $prod->total;
        }
        if($prod->month == 8)
        {
            $augp = $prod->total;
        }
        if($prod->month == 9)
        {
            $septp = $prod->total;
        }
        if($prod->month == 10)
        {
            $octp = $prod->total;
        }
        if($prod->month == 11)
        {
            $novp = $prod->total;
        }
        if($prod->month == 12)
        {
            $decp = $prod->total;
        }
    }
    endif;
    
?>
<script>
    $(function() {
    'use strict'

    var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    }

    var mode = 'index'
    var intersect = true

    var ctx = document.getElementById("sales-chart").getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['JAN','FEB','MAR','APR','MAY','JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [{
                    backgroundColor: 'orange',
                    borderColor: 'orange',
                    data: [
                    <?php echo $jan . ','; ?>
                    <?php echo $feb . ','; ?>
                    <?php echo $mar . ','; ?>
                    <?php echo $apr . ','; ?>
                    <?php echo $may . ','; ?>
                    <?php echo $jun . ','; ?>
                    <?php echo $jul . ','; ?>
                    <?php echo $aug . ','; ?>
                    <?php echo $sept . ','; ?>
                    <?php echo $oct . ','; ?>
                    <?php echo $nov . ','; ?>
                    <?php echo $dec . ','; ?>
                    ]
                }
            ]
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                mode: mode,
                intersect: intersect
            },
            hover: {
                mode: mode,
                intersect: intersect
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    // display: false,
                    gridLines: {
                        display: true,
                        lineWidth: '4px',
                        color: 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    },
                    ticks: $.extend({
                        beginAtZero: true,

                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            if (value >= 1000) {
                                value /= 1000
                                value += 'k'
                            }
                            return '$' + value
                        }
                    }, ticksStyle)
                }],
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: ticksStyle
                }]
            }
        }
    })
    
    
    var $productChart = $('#products-chart')
    var productChart = new Chart($productChart, {
        type: 'bar',
        data: {
            labels: ['JAN','FEB','MAR','APR','MAY','JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [{
                    backgroundColor: 'orange',
                    borderColor: 'orange',
                    data: <?php if(!empty($products)){ ?> [
                    <?php echo $janp . ','; ?>
                    <?php echo $febp . ','; ?>
                    <?php echo $marp . ','; ?>
                    <?php echo $aprp . ','; ?>
                    <?php echo $mayp . ','; ?>
                    <?php echo $junp . ','; ?>
                    <?php echo $julp . ','; ?>
                    <?php echo $augp . ','; ?>
                    <?php echo $septp . ','; ?>
                    <?php echo $octp . ','; ?>
                    <?php echo $novp . ','; ?>
                    <?php echo $decp . ','; ?>
                    ] <?php } else { ?>
                    data: 'Not found'
                    <?php } ?>
                }
            ]
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                mode: mode,
                intersect: intersect
            },
            hover: {
                mode: mode,
                intersect: intersect
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    // display: false,
                    gridLines: {
                        display: true,
                        lineWidth: '4px',
                        color: 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    },
                    ticks: $.extend({
                        beginAtZero: true,

                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            if (value >= 1000) {
                                value /= 1000
                                value += 'k'
                            }
                            return value
                        }
                    }, ticksStyle)
                }],
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: ticksStyle
                }]
            }
        }
    })


})
</script>
@endsection
@endsection