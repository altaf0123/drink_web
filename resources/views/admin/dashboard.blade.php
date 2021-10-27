@extends('layouts.adminapp')

@section('content')

  @include('admin.layouts.nav')
  
  @include('admin.layouts.sidebar')
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
                  <?= todays_total_invoice(); ?>
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
                <span class="info-box-number"><?= month_total_invoice(); ?></span>
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
                <span class="info-box-number"><?= $daysale->total??"0"; ?></span>
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
                <span class="info-box-number"><?= $monthsale->total??""; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Invoices And Sales</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <!--<button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">-->
                    <!--  <i class="fas fa-wrench"></i>-->
                    <!--</button>-->
                    <!--<div class="dropdown-menu dropdown-menu-right" role="menu">-->
                    <!--    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">-->
                          <!--<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">This Month</a>-->
                          <!--<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Quarter</a>-->
                          <!--<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">This Year</a>-->
                    <!--    </div>-->
                    <!--</div>-->
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                                                
                <div class="row">
                  <div class="col-md-12">
                    <p class="text-center">
                    </p>
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
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <!--<div class="col-md-4">-->
                  <!--  <p class="text-center">-->
                  <!--    <strong>Goal Completion</strong>-->
                  <!--  </p>-->

                  <!--  <div class="progress-group">-->
                  <!--    Add Products to Cart-->
                  <!--    <span class="float-right"><b>160</b>/200</span>-->
                  <!--    <div class="progress progress-sm">-->
                  <!--      <div class="progress-bar bg-primary" style="width: 80%"></div>-->
                  <!--    </div>-->
                  <!--  </div>-->
                    <!-- /.progress-group -->

                  <!--  <div class="progress-group">-->
                  <!--    Complete Purchase-->
                  <!--    <span class="float-right"><b>310</b>/400</span>-->
                  <!--    <div class="progress progress-sm">-->
                  <!--      <div class="progress-bar bg-danger" style="width: 75%"></div>-->
                  <!--    </div>-->
                  <!--  </div>-->

                    <!-- /.progress-group -->
                  <!--  <div class="progress-group">-->
                  <!--    <span class="progress-text">Visit Premium Page</span>-->
                  <!--    <span class="float-right"><b>480</b>/800</span>-->
                  <!--    <div class="progress progress-sm">-->
                  <!--      <div class="progress-bar bg-success" style="width: 60%"></div>-->
                  <!--    </div>-->
                  <!--  </div>-->

                    <!-- /.progress-group -->
                  <!--  <div class="progress-group">-->
                  <!--    Send Inquiries-->
                  <!--    <span class="float-right"><b>250</b>/500</span>-->
                  <!--    <div class="progress progress-sm">-->
                  <!--      <div class="progress-bar bg-warning" style="width: 50%"></div>-->
                  <!--    </div>-->
                  <!--  </div>-->
                    <!-- /.progress-group -->
                  <!--</div>-->
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                      <!--<span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>-->
                      <h5 class="description-header"><?= $daysale->daysale ?? ""; ?></h5>
                      <span class="description-text">Today Orders</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                      <!--<span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>-->
                      <h5 class="description-header">${{ $todayProfit ?? "0" }}</h5>
                      <span class="description-text">Today Profit</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->

                  <div class="col-sm-4 col-6">
                    <div class="description-block">
                      <!--<span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>-->
                      <h5 class="description-header">${{ $todayRevenue ?? "0" }}</h5>
                      <span class="description-text">Today Revenue</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-lg-6">
            <!--<div class="card">-->
            <!--  <div class="card-header border-0">-->
            <!--    <div class="d-flex justify-content-between">-->
            <!--      <h3 class="card-title">Restaurants Stats</h3>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--  <div class="card-body">-->
            <!--    <div class="d-flex">-->
            <!--      <p class="d-flex flex-column">-->
            <!--        <span>Restaurant Over Time</span>-->
            <!--      </p>-->
                  <!--<p class="ml-auto d-flex flex-column text-right">-->
                  <!--  <span class="text-success">-->
                  <!--    <i class="fas fa-arrow-up"></i> 33.1%-->
                  <!--  </span>-->
                  <!--  <span class="text-muted">Since last month</span>-->
                  <!--</p>-->
                <!--</div>-->
                <!-- /.d-flex -->

                <!--<div class="position-relative mb-4">-->
                <!--  <canvas id="restaurant-chart" height="200"></canvas>-->
                <!--</div>-->

                <!--<div class="d-flex flex-row justify-content-end">-->
                <!--  <span class="mr-2">-->
                <!--    <i class="fas fa-square text-primary"></i> This year-->
                <!--  </span>-->

                  <!--<span>-->
                  <!--  <i class="fas fa-square text-gray"></i> Last year-->
                  <!--</span>-->
                <!--</div>-->
                <!--<div class="d-flex">-->
                <!--  <p class="d-flex flex-column">-->
                <!--    <span class="text-bold text-lg"><?php echo json_encode(count($cities)); ?></span>-->
                <!--    <span>Visitors Over Time</span>-->
                <!--  </p>-->
                <!--  <p class="ml-auto d-flex flex-column text-right">-->
                <!--    <span class="text-success">-->
                <!--      <i class="fas fa-arrow-up"></i> 12.5%-->
                <!--    </span>-->
                <!--    <span class="text-muted">Since last week</span>-->
                <!--  </p>-->
                <!--</div>-->
                <!-- /.d-flex -->

                <!--<div class="position-relative mb-4">-->
                <!--  <canvas id="visitors-chart" height="200"></canvas>-->
                <!--</div>-->

                <!--<div class="d-flex flex-row justify-content-end">-->
                <!--  <span class="mr-2">-->
                <!--    <i class="fas fa-square text-primary"></i> This Week-->
                <!--  </span>-->

                <!--  <span>-->
                <!--    <i class="fas fa-square text-gray"></i> Last Week-->
                <!--  </span>-->
                <!--</div>-->
            <!--  </div>-->
            <!--</div>-->
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">User Stats</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-sm btn-tool">
                      <span id="dotGreen"></span><span> Active</span>
                  </a>
                  <a href="#" class="btn btn-sm btn-tool">
                      <span id="dotBlue"></span><span> Suspended</span>
                  </a>
                </div>
              </div>
              <div class="card-body">
                  @if(!empty($active_user) && !empty($inactive_user))
                  <canvas id="pieChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 366px;margin:0 auto;" 
                  class="chartjs-render-monitor" width="366" height="250"></canvas>
                  @else
                  <h2><center>No record found</center></h2>
                  @endif
                <!-- /.d-flex -->
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <!--<div class="card">-->
            <!--  <div class="card-header border-0">-->
            <!--    <div class="d-flex justify-content-between">-->
            <!--      <h3 class="card-title">Sales</h3>-->
            <!--      <a href="javascript:void(0);"></a>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--  <div class="card-body">-->
            <!--    <div class="d-flex">-->
            <!--      <p class="d-flex flex-column">-->
            <!--        <span>Sales Over Time</span>-->
            <!--      </p>-->
                  <!--<p class="ml-auto d-flex flex-column text-right">-->
                  <!--  <span class="text-success">-->
                  <!--    <i class="fas fa-arrow-up"></i> 33.1%-->
                  <!--  </span>-->
                  <!--  <span class="text-muted">Since last month</span>-->
                  <!--</p>-->
            <!--    </div>-->
                <!-- /.d-flex -->

            <!--    <div class="position-relative mb-4">-->
            <!--      <canvas id="sales-chart" height="200"></canvas>-->
            <!--    </div>-->

            <!--    <div class="d-flex flex-row justify-content-end">-->
            <!--      <span class="mr-2">-->
            <!--        <i class="fas fa-square text-primary"></i> This year-->
            <!--      </span>-->

                  <!--<span>-->
                  <!--  <i class="fas fa-square text-gray"></i> Last year-->
                  <!--</span>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Restaurants Stats</h3>
                                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                  <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 366px;margin:0 auto;" 
                  class="chartjs-render-monitor" width="366" height="250"></canvas>
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
  @include('admin.layouts.footer');
</div>
<!-- ./wrapper -->

@section('page_js')
<?php 

    $jan=0;$feb=0;$mar=0;$apr=0;$may=0;$jun=0;$jul=0;$aug=0;$sept=0;$oct=0;$nov=0;$dec=0;
    foreach($orders3 as $order)
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
    $janr=0;$febr=0;$marr=0;$aprr=0;$mayr=0;$junr=0;$julr=0;$augr=0;$septr=0;$octr=0;$novr=0;$decr=0;
    foreach($restaurants as $restaurant)
    {
        if($restaurant->month == 1)
        {
            $janr = $restaurant->total;
        }
        if($restaurant->month == 2)
        {
            $febr = $restaurant->total;
        }
        if($restaurant->month == 3)
        {
            $marr = $restaurant->total;
        }
        if($restaurant->month == 4)
        {
            $aprr = $restaurant->total;
        }
        if($restaurant->month == 5)
        {
            $mayr = $restaurant->total;
        }
        if($restaurant->month == 6)
        {
            $junr = $restaurant->total;
        }
        if($restaurant->month == 7)
        {
            $julr = $restaurant->total;
        }
        if($restaurant->month == 8)
        {
            $augr = $restaurant->total;
        }
        if($restaurant->month == 9)
        {
            $septr = $restaurant->total;
        }
        if($restaurant->month == 10)
        {
            $octr = $restaurant->total;
        }
        if($restaurant->month == 11)
        {
            $novr = $restaurant->total;
        }
        if($restaurant->month == 12)
        {
            $decr = $restaurant->total;
        }
    }
    
    
?>
<script>
    var mode = 'index';
    var intersect = true;
    var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    }
    
    $(function() {
    'use strict'
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutData        = {
      labels: [
          'Active',
          'Inactive',
          'New',
      ],
      datasets: [
        {
          data: [{{ $active }},{{ $inactive }},2],
          backgroundColor : ['#98d613', '#d9b918', '#5488e8'],
        }
      ]
    }
    
    var donutData2        = {
      labels: [
          'Active',
          'Suspended',
          'New',
      ],
      datasets: [
        {
          data: [{{ $active_user }},{{ $inactive_user }},2],
          backgroundColor : ['#98d613', '#d9b918', '#5488e8'],
        }
      ]
    }
    
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })
    
    var pieChartCanvas1 = $('#pieChart1').get(0).getContext('2d')
    var pieData1        = donutData2;
    var pieOptions1     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas1, {
      type: 'pie',
      data: pieData1,
      options: pieOptions1
    })
    
    
    var $restChart = $('#restaurant-chart')
    var restChart = new Chart($restChart, {
        type: 'bar',
        data: {
            labels: ['JAN','FEB','MAR','APR','MAY','JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [{
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    data: <?php if(!empty($restaurants)){ ?> [
                    <?php echo $janr . ','; ?>
                    <?php echo $febr . ','; ?>
                    <?php echo $marr . ','; ?>
                    <?php echo $aprr . ','; ?>
                    <?php echo $mayr . ','; ?>
                    <?php echo $junr . ','; ?>
                    <?php echo $julr . ','; ?>
                    <?php echo $augr . ','; ?>
                    <?php echo $septr . ','; ?>
                    <?php echo $octr . ','; ?>
                    <?php echo $novr . ','; ?>
                    <?php echo $decr . ','; ?>
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
    


})
</script>
<script>
$(function () {
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
        },
        {
            label: 'Invoices',
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
    
    function runSecondChart() {
         var salesChartCanvas2 = $('#salesChart_new').get(0).getContext('2d');
        var salesChartData2 = {
            labels: ['JAN','FEB','MAR','APR','MAY','JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [
                {
                    label: 'Sales',
                    backgroundColor: '#ffc107',
                    borderColor: '#c2c2c2',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [3,5,2,3,5,6,6,73,3,34,3,3]
                },
                {
                    label: 'Saleds',
                    backgroundColor: '#ffc107',
                    borderColor: '#c2c2c2',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [3,5,2,3,5,6,6,73,3,34,3,3]
                }   
            ]
        }
        
          
        var salesChartOptions2 = {
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
        var salesChart_new = new Chart(salesChartCanvas2, {
                type: 'line',
                data: salesChartData2,
                options: salesChartOptions2
            }
        )
    }

    $('#salesChart_new').on("shown.bs.tab",function(){
        alert(1);
      runSecondChart();
      $('#salesChart_new').off();//to remove the binded event after initial rendering
    });

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart(salesChartCanvas, {
    type: 'line',
    data: salesChartData,
    options: salesChartOptions
  }
  )

    
});

    var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    }

    var mode = 'index';
    var intersect = true;
</script>
@endsection
@endsection