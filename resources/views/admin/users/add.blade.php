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
<h1>Add New</h1>
<a href="{{ url('admin/users') }}" class="btn btn-primary mt-3">Back to List</a>

</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= url('admin'); ?>">Main</a></li>
    <li class="breadcrumb-item active">Users</li>
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
                <form class="form-horizontal form-label-left" method="POST" action="{{ url('admin/users/add') }}"
                    enctype="multipart/form-data" novalidate >
                    @csrf
                    <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name *</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email *</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email">
                    </div>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Role *</label>
                    <div class="col-sm-10">
                        <select name="role" id="role" class="form-control">
                            <option value="user">User</option>
                            <option value="user1">Restaurant Owner</option>
                            <option value="waiter">Waiter</option>
                            <option value="manager">Manager</option>
                        </select>
                    </div>
                    </div>
                    <div class="form-group row" id='restaurant_id'>
                        <label class="col-sm-2 col-form-label">Restaurant *</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="restaurant_id" >
                                @foreach(getListRestaurant() as $row)
                                  <option value="{{ $row->id }}" >
                                  {{ $row->name }}
                                  </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Password *</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Min 8 Length : Password">
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Profile Image </label>
                        <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" name="profile_picture">
                              <label class="custom-file-label" for="customFile"></label>
                            </div>
                    </div>
                    <div class="form-group row">
                    <div id='datas'></div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-danger">Add</button>
                    </div>
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
$("#restaurant_id").hide();
$("#datas").html('');
$("#role").on('change',function(){
    if($("#role").val() == 'user1') {
        $("#restaurant_id").show();
    } else {
        $("#datas").html('<input type="hidden" name="restaurant_id" id="restaurant_id" value="0" disabled>');
        $("#restaurant_id").hide();
    }
});
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
@endsection
@include('admin.layouts.footer');

@endsection

