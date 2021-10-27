@extends('layouts.adminapp')

@section('content')

@include('manager.layouts.nav')
  
@include('manager.layouts.sidebar')

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
            <h1 class="m-0 text-dark">Dashboard v3</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
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
                  0
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
                <span class="info-box-number">0</span>
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
                                    <canvas id="salesChart" style="height: 180px; display: block; width: 890px;" class="chartjs-render-monitor" width="890" height="180"></canvas>
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <canvas id="salesChart_new" style="height: 180px; display: block; width: 890px;" class="chartjs-render-monitor" width="890" height="180"></canvas>
                                </div>
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
                <!--    <span class="text-bold text-lg"><?php //echo json_encode(count($cities)); ?></span>-->
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
                      <span id="dotBlue"></span><span> Inactive</span>
                  </a>
                </div>
              </div>
              <div class="card-body">
                  <canvas id="pieChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 366px;margin:0 auto;" 
                  class="chartjs-render-monitor" width="366" height="250"></canvas>
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
                <!--<div class="card-tools">-->
                  <!--<a href="#" class="btn btn-sm btn-tool">-->
                  <!--    <span id="dotGreen"></span><span> Active</span>-->
                  <!--</a>-->
                  <!--<a href="#" class="btn btn-sm btn-tool">-->
                  <!--    <span id="dotBlue"></span><span> Inactive</span>-->
                  <!--</a>-->
                <!--</div>-->
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

@endsection
@endsection