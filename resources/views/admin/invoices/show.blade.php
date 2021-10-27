@extends('layouts.adminapp')

@section('content')

@include('admin.layouts.nav')  
@include('admin.layouts.sidebar')
<?php 
    $url = explode('/',url('/'));
    $url = $url[0]."//".$url[1].$url[2]."/".$url[3].'/drinkapp_php/public/uploads/';
?>
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
        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                foreach($records as $row):
                  $items[] = $row->item_id;
                endforeach; ?> 
              <div class="col-12 product-image-thumbs">
                    <div class="row">

                  <?php foreach($items as $pic): ?>

                    <div class="col-md-2">
                        <div class="product-image-thumb"><img src="{{ $url }}/products/{{getProductInfo($pic)->picture }}" 
                        alt="Product Image" width="100" height="100">
                        </div>
                        Unit Price: ${{ getProductInfo($pic)->price }}
                    </div>
                  <?php endforeach; ?>
                                      </div>

              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">Order # {{$records[0]->order_id}}</h3>
              <hr>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center" style="background: <?php echo ($records[0]->payment_status) == 'paid' ? 'silver' : ''; ?>">
                  <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked="{{ $records[0]->payment_status == 'paid' ? 'checked':'' }}">
                  Paid
                  <br>
                  <i class="fas fa-circle fa-2x text-green"></i>
                </label>

                <label class="btn btn-default text-center" style="background: <?php echo ($records[0]->payment_status) == 'unpaid' ? 'silver' : ''; ?>">
                  <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                  Unpaid
                  <br>
                  <i class="fas fa-circle fa-2x text-red"></i>
                </label>
              </div>


              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  Grand Total: $<?php echo $records[0]->grand_total ?? "0"; ?>
                </h2>
                <h4 class="mt-0">
                  <small>Sub Total: $<?php echo $records[0]->sub_total ?? "0"; ?> </small>
                </h4>
              </div>
              <div class="mt-4">
                <form class="form-horizontal form-label-left" method="POST" action="{{ url('admin/orders/update') }}/{{ collect(request()->segments())->last() }}"
                                  enctype="multipart/form-data" >
                    @csrf
                            <div class="form-group">
                                <label>Serving Waiter</label>
                                <select class="form-control" name="waiter_id">
                                    <option value="">Choose Waiter</option>
                                    @foreach(get_list('users', array('role'=>'waiter')) as $row)
                                        <option value="{{ $row->id }}" <?php echo $records[0]->waiter_id >> "0" == $row->id ? 'selected' : ''; ?>
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
@include('admin.layouts.footer');

@endsection

