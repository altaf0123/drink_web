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
<h1>Add New Deal</h1>
<a onclick="window.history.back();" class="btn btn-primary mt-3">Back to List</a>

</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Main</a></li>
    <li class="breadcrumb-item active">Deals</li>
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
                    <form class="form-horizontal form-label-left" method="POST" action="{{ url('admin/deals/add') }}"
                                  enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="form-group">
                            <label>Deal Title *</label>
                            <input type="text" class="form-control" name="title" placeholder="Deal Name">
                        </div>
                        <div class="form-group">
                            <label>User *</label>
                            <select class="select2" multiple="multiple" data-placeholder="Select Users to apply Deals" name="user_id[]" style="width: 100%;">
                                @foreach(get_list('users',array('role'=>'user','restaurant_id'=>0,'account_status'=>'active')) as $row)
                                  <option value="{{ $row->id }}" >
                                  {{ $row->name }}
                                  </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Deal Description *</label>
                            <textarea class="form-control" name="description" row="100">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control" name="type">
                                <option value="">Choose Type</option>
                                <option value="Local Happy Hour">Local Happy Hour</option>
                                <option value="Restaurant Happy Hour">Restaurant Happy Hour</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1" selected>Enabled</option>
                                <option value="0">Disabled</option>
                            </select>
                        </div>
                        <input type="hidden" name="created_by" value="Admin">
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
  <!-- Select2 -->
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<script src="https://adminlte.io/themes/v3/plugins/select2/js/select2.full.min.js"></script>


<script src="{{ asset('assets') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $('.select2').select2()

$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
@endsection
@include('admin.layouts.footer');

@endsection

