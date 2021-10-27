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
<h1>Update Deal</h1>
<A class="btn btn-primary mt-3" href="{{ url()->previous() }}">Back to List</A>

</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
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
    @if(!empty($records))
    <!-- /.card-header -->
                <div class="card-body">
                    <form class="form-horizontal form-label-left" method="POST" action="{{ url('admin/deals/update') }}/{{ $records->id }}"
                                  enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="form-group">
                            <label>Deal Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $records->title }}" placeholder="Title Name">
                        </div>
                        <div class="form-group">
                            <label>Deal Description</label>
                            <textarea class="form-control" name="description" row="100">{{ $records->description }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control" name="type">
                                <option value="">Choose Type</option>
                                <option value="Local Happy Hour"  <?= $records->type == "Local Happy Hour" ? 'selected' : ''; ?>>Local Happy Hour</option>
                                <option value="Restaurant Happy Hour" <?= $records->type == "Restaurant Happy Hour" ? 'selected' : ''; ?>>Restaurant Happy Hour</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="">Choose Type</option>
                                <option value="1" <?= $records->status == 1 ? 'selected' : ''; ?>>Enabled</option>
                                <option value="0" <?= $records->status == 0 ? 'selected' : ''; ?>>Disabled</option>
                            </select>
                        </div>
                        <div class="card-footer mb-4">
                        <input type="hidden" name="created_by" value="{{ $records->created_by }}">
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
<script>
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
@endsection
@include('admin.layouts.footer');

@endsection

