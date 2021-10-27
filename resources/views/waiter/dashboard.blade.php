@extends('layouts.adminapp')

@section('content')

  @include('waiter.layouts.nav')
  
  @include('waiter.layouts.sidebar')
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
                <span class="info-box-text">Today Tips</span>
                <span class="info-box-number"><?= $tips_daily ?? "0"; ?></span>
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
                <span class="info-box-text">This Month Tips</span>
                <span class="info-box-number"><?= $tips_month ?? "0"; ?></span>
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
                <span class="info-box-number"><?= $monthsale??"0"; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Sales</h3>
                </div>
              </div>
              <div class="card-body">
                    <div class="chart">
                        <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <?php if(!empty($orders)){ ?>
                                    <canvas id="salesChart" style="height: 180px; display: block; width: 890px;" class="chartjs-render-monitor" width="890" height="180"></canvas>
                                    <?php } else { ?>
                                    <h2><center>No record Found</center></h2>
                                    <?php } ?>
                                </div>
                                <!--<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">-->
                                <!--    <canvas id="salesChart_new" style="height: 180px; display: block; width: 890px;" class="chartjs-render-monitor" width="890" height="180"></canvas>-->
                                <!--</div>-->
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                   3
                                </div>
                        </div>
                    </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Order Stats</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-sm btn-tool">
                      <span id="dotGreen"></span><span> Total</span>
                  </a>
                  <a href="#" class="btn btn-sm btn-tool">
                      <span id="dotBlue"></span><span> Delivered/Undelivered</span>
                  </a>
                </div>
              </div>
              <div class="card-body" style="margin: 0 auto;">
              <div class="item html">
                  <h5>Total Orders</h5>
                  <h2>{{ $total_orders }}</h2>
                  <svg class="mysvg2" width="160" height="160" xmlns="http://www.w3.org/2000/svg" class="text-center">
                  <g>
                    <title>Layer 1</title>
                    <circle class="circle_animation" r="69.85699" cy="81" cx="81" stroke-width="8" stroke="#6fdb6f" fill="none"/>
                  </g>
                  </svg>
              </div>
              <div class="item css">
                  <h5>Delivered Orders</h5>
                  <h2>{{ $delivered }}</h2>
                  <svg class="mysvg1" width="160" height="160" xmlns="http://www.w3.org/2000/svg"  class="text-center">
                  <g>
                    <title>Layer 1</title>
                    <circle class="circle_animation" r="69.85699" cy="81" cx="81" stroke-width="8" stroke="#69aff4" fill="none"/>
                  </g>
                  </svg>
              </div>
              
              <div class="item css">
                  <h5>Undelivered Orders</h5>
                  <h2>{{ $pending }}</h2>
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
<script>
    var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    }

    var mode = 'index';
    var intersect = true;

    var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    }

    var mode = 'index';
    var intersect = true;

    var salesChartCanvas = $('#salesChart').get(0).getContext('2d');

    var salesChartData = {
        labels: [<?php foreach($orders as $order) { echo "'". $order->month . "'" . ','; } ?>],
        datasets: [
            {
                label: 'Sales',
                backgroundColor: '#ffc107',
                borderColor: '#333',
                tension: 0.5,
                data: <?php if(!empty($orders)){ ?> [
                <?php foreach($orders as $order) { echo "'". $order->total . "'" . ','; } ?>
                ] <?php } ?>
            }
        ]
    }
  
    var salesChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            gridLines: {
              display: false
            }
          }],
          yAxes: [{
            gridLines: {
              display: false
            }
          }]
        }
    }
    
    var salesChart = new Chart(salesChartCanvas, {
            type: 'line',
            data: salesChartData,
            options: salesChartOptions
        }
    )
</script>
@endsection
@endsection