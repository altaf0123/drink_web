@extends('layouts.adminapp')
@section('content')

@include('waiter.layouts.nav')  
@include('waiter.layouts.sidebar')
<style>
    #myArea {
        background:#e8e8e8;
    }
</style>
<?php 
    $url = explode('/',url('/'));
    $url = $url[0]."//".$url[1].$url[2].'/drinkapp_mobile/public/uploads';
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
                  <?php foreach($items as $pic): ?>
                    <div class="product-image-thumb"><img src="{{ $url . '/products' }}/{{getProductInfo($pic)->picture }}" 
                    alt="Product Image"></div>
                  <?php endforeach; ?>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">Order # {{$records[0]->order_id}}</h3>
              <hr>
              <h4>Delivery Status</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center" id="<?php echo $records[0]->order_status == 'completed' ? 'myArea' : ''; ?>">
                  <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked="">
                  Completed
                  <br>
                  <i class="fas fa-circle fa-2x text-green"></i>
                </label>
                <label class="btn btn-default text-center" id="<?php echo $records[0]->order_status == 'pending' ? 'myArea' : ''; ?>">
                  <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                  Pending
                  <br>
                  <i class="fas fa-circle fa-2x text-red"></i>
                </label>
              </div>

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  Grand Total: $<?php echo $records[0]->grand_total; ?>
                </h2>
                <!--<h4 class="mt-0">-->
                <!--  <small>Sub Total: $<?php echo $records[0]->sub_total; ?> </small>-->
                <!--</h4>-->
              </div>

              <!--<div class="mt-4">-->
              <!--  <div class="btn btn-primary btn-lg btn-flat">-->
              <!--    <i class="fas fa-cart-plus fa-lg mr-2"></i>-->
              <!--    Add to Cart-->
              <!--  </div>-->

              <!--  <div class="btn btn-default btn-lg btn-flat">-->
              <!--    <i class="fas fa-heart fa-lg mr-2"></i>-->
              <!--    Add to Wishlist-->
              <!--  </div>-->
              <!--</div>-->

              <!--<div class="mt-4 product-share">-->
              <!--  <a href="#" class="text-gray">-->
              <!--    <i class="fab fa-facebook-square fa-2x"></i>-->
              <!--  </a>-->
              <!--  <a href="#" class="text-gray">-->
              <!--    <i class="fab fa-twitter-square fa-2x"></i>-->
              <!--  </a>-->
              <!--  <a href="#" class="text-gray">-->
              <!--    <i class="fas fa-envelope-square fa-2x"></i>-->
              <!--  </a>-->
              <!--  <a href="#" class="text-gray">-->
              <!--    <i class="fas fa-rss-square fa-2x"></i>-->
              <!--  </a>-->
              <!--</div>-->

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
@include('waiter.layouts.footer');

@endsection

