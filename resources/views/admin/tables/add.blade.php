@extends('layouts.adminapp')
@section('content')

@include('admin.layouts.nav')  
@include('admin.layouts.sidebar')
<div class="content-wrapper" style="min-height: 2077.69px;">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Add</h1>
<a onclick="window.history.back();" class="btn btn-primary mt-3">Back to List</a>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Main</a></li>
    <li class="breadcrumb-item active">Tables</li>
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
    <!-- /.card-header -->
                <div class="card-body">
                    <form class="form-horizontal form-label-left" method="POST" action="{{ url('admin/tables/add') }}"
                                  enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="form-group">
                            <label>Table Name *</label>
                            <input type="text" class="form-control" name="table_name" placeholder="Table Name">
                        </div>
                        <div class="form-group">
                            <label>Price *</label>
                            <input type="text" class="form-control" name="price" placeholder="Price" >
                        </div>
                        <div class="form-group">
                            <label>Table Description *</label>
                            <textarea class="form-control" name="description" row="100">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Table Image</label>
                            <br>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" name="table_image">
                              <label class="custom-file-label" for="customFile"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Seating Capacity *</label>
                            <input type="text" class="form-control" name="seating_capacity" placeholder="Seating Capacity" >
                        </div>
                        <div class="form-group">
                            <label>Restaurant  *</label>
                            <select class="form-control" name="restaurant_id">
                                @foreach(getListRestaurant() as $row)
                                  <option value="{{ $row->id }}" >
                                  {{ $row->name }}
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
<script>
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
@endsection
@include('admin.layouts.footer');

@endsection

