@extends('layouts.adminapp')
@section('content')

@include('bar.layouts.nav')  
@include('bar.layouts.sidebar')
<style>
    #myArea {
        background:#e8e8e8;
    }
</style>
<div class="content-wrapper" style="min-height: 2077.69px;">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Orders</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('user') }}">Main</a></li>
        <li class="breadcrumb-item active">Orders</li>
      </ol>
    </div>
  </div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <!-- /.card-header -->
        
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"> </h3>
              <div class="col-12">
                <h2>Products</h2>
              </div>
              <?php 
                if(!empty($records)):
                foreach($records as $row): 
                  $items[] = $row->item_id;
                endforeach; ?> 
              <div class="col-12 product-image-thumbs">
                <div class="row">
                  <?php if(!empty($items)): foreach($items as $pic): ?>

                    <div class="col-md-10">
                        <div class="product-image-thumb"><img src="{{ $url }}/products/{{getProductInfo($pic)->picture }}" 
                        alt="Product Image">
                        </div>
                        Unit Price: ${{ getProductInfo($pic)->price }}
                    </div>
                  <?php endforeach; endif; ?>
                </div>
              </div>
              <?php endif; ?>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">Order # {{$records[0]->order_id}}</h3>
              <hr>
              <h4>Payment Status</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center" id="<?php echo $records[0]->payment_status == 'paid' ? 'myArea' : ''; ?>">
                  <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked="">
                  Paid
                  <br>
                  <i class="fas fa-circle fa-2x text-green"></i>
                </label>
                <label class="btn btn-default text-center" id="<?php echo $records[0]->payment_status == 'unpaid' ? 'myArea' : ''; ?>">
                  <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                  Unpaid
                  <br>
                  <i class="fas fa-circle fa-2x text-red"></i>
                </label>
              </div>

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  Grand Total: $<?php echo $records[0]->grand_total; ?>
                </h2>
                <h4 class="mt-0">
                  <!--<small>Sub Total: $<?php //echo $records[0]->sub_total; ?> </small>-->
                </h4>
              </div>


              <div class="mt-4">
                <form class="form-horizontal form-label-left" method="POST" action="{{ url('user/orders/update') }}/<?php echo request()->segment(count(request()->segments())); ?>"
                                  enctype="multipart/form-data" >
                    @csrf
                            <div class="form-group">
                                <label>Serving Waiter</label>
                                <select class="form-control" name="waiter_id">
                                    <option value="">Choose Waiter</option>
                                    @foreach(get_list('users', array('restaurant_id' => Auth::user()->restaurant_id, 'role'=>'waiter','account_status'=>'active')) as $row)
                                        <option value="{{ $row->id }}" <?php echo $records[0]->waiter_id == $row->id ? 'selected' : ''; ?>
                                        >{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                    
                    <button type="submit" class="btn btn-primary btn-lg btn-flat">
                      <i class="fas fa-cart-plus fa-lg mr-2"></i>
                      Update
                    </button>
                </form>
              </div>
          </div>

        </div>
        <!-- /.card-body -->
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

