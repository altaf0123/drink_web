@extends('layouts.adminapp')
@section('content')

@include('bar.layouts.nav')  
@include('bar.layouts.sidebar')
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
<h1>Update New</h1>
<a href="{{ url('user/managers') }}" class="btn btn-primary mt-3">Back to List</a>

</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ url('user') }}">Main</a></li>
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
                <form class="form-horizontal form-label-left" method="POST" action="{{ url('user/users/update') }}/{{ $records->id }}"
                    enctype="multipart/form-data" novalidate >
                    @csrf
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name *</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $records->name }}" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email *</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $records->email }}" name="email" placeholder="Email">
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
                        <select name="role" class="form-control">
                            <?php if(Request::segment(2) == 'managers'): ?>
                            <option value="manager" <?php echo ($records->role == 'manager') ? 'selected' : ''; ?>>Manager</option>
                            <?php else: ?>
                            <option value="waiter" <?php echo ($records->role == 'waiter') ? 'selected' : ''; ?>>Waiter</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Password *</label>
                    <div class="col-sm-10">
                        <input type="text"
                        class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Min 8 Length : Password">
                    </div>
                    </div>
                    
                    <div class="form-group">
                       <label>Profile Imagesss </label>
                       <?= $records->profile_picture; ?>
                       <br>
                       <img src="<?php echo !empty($records->profile_picture)
                          ? $url.'/users/'.$records->profile_picture 
                          : 'https://via.placeholder.com/200/333/fff?text=Not found'; ?>"
                          class="img-fluid rounded mb-2 border border-warning" name="description" width="250" height="250">
                       <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile" name="profile_picture" value="{{ $records->profile_picture }}">
                          <label class="custom-file-label" for="customFile">{{ $records->profile_picture }}</label>
                          <input type="hidden" name="user_img" value="{{ $records->profile_picture }}" >
                       </div>
                    </div>                    
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Longitude *</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('long') is-invalid @enderror" value="{{ $records->long }}" name="long">
                        </div>
                    </div> 
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Latitude *</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('lat') is-invalid @enderror" value="{{ $records->lat }}" name="lat">
                        </div>
                    </div> 
                    
                    <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-danger">Update</button>
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
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
@endsection
@include('admin.layouts.footer');

@endsection

