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
<h1>Assign Waiter</h1>
<a onclick="window.history.back();" class="btn btn-primary mt-3">Back to List</a>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Main</a></li>
    <li class="breadcrumb-item active">Waiters</li>
    </ol>
</div>
</div>
</div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-7">
    <div class="card">
    <!-- /.card-header -->
                <div class="card-body">
                <form class="form-horizontal form-label-left" method="POST" action="{{ url('admin/waiters/assign') }}/{{ $records['id'] }}"
                    enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Restaurants</label>
                        <div class="col-sm-10">
                            <select name="restaurant_id" class="form-control">
                                @foreach(getListRestaurant() as $row)
                                <option value="{{ $row->id }}" 
                                <?php echo $records['data'] == $row->id ? 'selected' : ''; ?>>{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-danger">Assign</button>
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

