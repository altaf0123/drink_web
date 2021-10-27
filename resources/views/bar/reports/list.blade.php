@extends('layouts.adminapp')
@section('content')

@include('bar.layouts.nav')  
@include('bar.layouts.sidebar')
<div class="content-wrapper" style="min-height: 2077.69px;">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
  
    <div class="col-sm-6">
    <h1>Reports</h1>

    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('user') }}">Main</a></li>
        <li class="breadcrumb-item active">Reports</li>
      </ol>
    </div>
  </div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-6">
      <div class="cards">
        <!-- /.card-header -->
        <div class="card-bodys">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <a href="{{ url('user/reports/total_orders_all_time') }}">
                        Total Orders All Time
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <a href="{{ url('user/reports/orders_by_highest_grand') }}">
                        Most Profitable Bar This Year
                    </a>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
<!-- /.container-fluid -->
</section>
<!-- /.content -->

</div>
@section('page_js')

@endsection
@include('bar.layouts.footer');

@endsection

