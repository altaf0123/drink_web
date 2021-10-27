@extends('layouts.adminapp')
@section('content')

@include('bar.layouts.nav')  
@include('bar.layouts.sidebar')
<div class="content-wrapper" style="min-height: 2077.69px;">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add New</h1>
                <a href="{{ url('user/reservations') }}" class="btn btn-primary mt-3">Back to List</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('user') }}">Main</a></li>
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
                    <form class="form-horizontal form-label-left" method="POST" action="{{ url('user/reservations/add') }}"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="form-group">
                            <label>Table *</label>
                            <select class="form-control" name="table_id">
                                <option value="">Choose Table</option>
                                @foreach(get_list('restaurant_tables', array('restaurant_id'=>Auth::user()->restaurant_id,'status'=>'1')) as $row)
                                  <option value="{{ $row->id }}" >
                                  {{ $row->table_name }}
                                  </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Price *</label>
                            <input type="text" class="form-control" name="price" placeholder="Price" >
                        </div>
                        <div class="form-group">
                            <label>Reservation date and time *</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                                </div>
                                <input type="text" class="form-control float-right" name="times" id="reservationtime">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Status *</label>
                            <select class="form-control" name="status">
                                <option value="">Choose Status</option>
                                <option value="confirmed" >
                                Confirmed
                                </option>
                                <option value="un_confirmed" >
                                Unconfirmed
                                </option>
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
<!-- InputMask -->
<script src="{{ asset('assets') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('assets') }}/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="{{ asset('assets') }}/plugins/daterangepicker/daterangepicker.js"></script>

<script>
$(document).ready(function () {
        //Date range picker
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'YYYY-MM-DD hh:mm:ss'
      }
    });
  
    bsCustomFileInput.init();
});
</script>
@endsection
@include('bar.layouts.footer');

@endsection

