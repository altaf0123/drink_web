@extends('layouts.adminapp')
@section('content')

@include('admin.layouts.nav')  
@include('admin.layouts.sidebar')
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
<h1>Update Product</h1>
<a onclick="window.history.back();" class="btn btn-primary mt-3">Back to List</a>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Main</a></li>
    <li class="breadcrumb-item active">Products</li>
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
    <div class="card">
    @if(!empty($records))
    <!-- /.card-header -->
                <div class="card-body">
                    <form class="form-horizontal form-label-left" method="POST" action="{{ url('admin/products/update') }}/{{$records->id}}"
                                  enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="form-group">
                            <label>Product Name *</label>
                            <input type="text" class="form-control" name="name" placeholder="Cat Name" value="{{ $records->name }}">
                        </div>
                        <div class="form-group">
                            <label>Unit Price *</label>
                            <input class="form-control" name="price" value="{{ $records->price }}" data-inputmask="'alias': 'currency'" style="text-align: left;">
                        </div>
                        <div class="form-group">
                            <label>Product Description *</label>
                            <textarea class="form-control" name="description" row="100">
                                {{ $records->description }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Product Image</label>
                            <br>
                            <img src="<?php echo !empty($records->picture)
                            ? $url.'/products/'.$records->picture 
                            : 'https://via.placeholder.com/200/333/fff?text=Not found'; ?>"
                            class="img-fluid mb-2 border border-warning" name="description" width="250" height="250">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" name="image" value="{{ $records->picture }}">
                              <label class="custom-file-label" for="customFile">{{ $records->picture }}</label>
                              <input type="hidden" name="prod_img" value="{{ $records->picture }}" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Type *</label>
                            <select class="form-control" name="type">
                                <option value="">Choose Type</option>
                                @foreach(get_list('types') as $row)
                                <option value="{{ $row->types_name }}" <?= $row->types_name == $records->type ? 'selected' : ''; ?>>{{ $row->types_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Restaurant</label>
                            <select class="form-control" name="restaurant_id">
                                @foreach(getListRestaurant() as $row)
                                  <option value="{{ $row->id }}" 
                                  <?php echo ($records->restaurant_id == $row->id) ? 'selected' : ''; ?>
                                  >
                                  {{ $row->name }}
                                  </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="cat_id">
                                @foreach(getListCategory() as $row)
                                  <option value="{{ $row->id }}" 
                                  <?php echo ($records->cat_id == $row->id) ? 'selected' : ''; ?>
                                  >
                                  {{ $row->title }}
                                  </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="card-footer mb-4">
                        <button type="submit" class="btn btn-primary">Go <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </form>
                <!-- /.card-body -->
            </div>
    @endif
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
<script src="{{ asset('assets') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.js'></script>
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script>

$(document).ready(function(){
    $(":input").inputmask();
});

$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
@endsection
@include('admin.layouts.footer');

@endsection

