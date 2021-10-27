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
<a href="{{ url('admin/restaurants/index') }}" class="btn btn-primary mt-3">Back to List</a>

</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Main</a></li>
    <li class="breadcrumb-item active">Bar</li>
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
                    <form class="form-horizontal form-label-left" method="POST" action="{{ url('admin/restaurants/add') }}"
                                  enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" class="form-control" name="name" placeholder="Bar Name" required>
                        </div>
                        <div class="form-group">
                            <label>Address *</label>
                            <input type="address" class="form-control" name="address" placeholder="Address" required>
                        </div>
                        <div class="form-group">
                            <label>Latitude *</label>
                            <input type="text" name="lat" class="form-control" required>
                        </div>

                        <div class="form-group" >
                            <label>Longitude *</label>
                            <input type="text" name="long" class="form-control" required>
                        </div>
                        
                        <!--<div class="form-group" >-->
                        <!--    <label>User</label>-->
                        <!--    <select name="user_id" class="form-control">-->
                        <!--        @foreach(get_list('users', array('role'=>'user', 'restaurant_id' => '0')) as $row)-->
                        <!--            <option value='{{ $row->id }}'>{{ $row->name }}</option>-->
                        <!--        @endforeach-->
                        <!--    </select>-->
                        <!--</div>-->
                        <div class="card-footer mb-4">
                        <button type="submit" class="btn btn-primary">Go <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </form>
                <!-- /.card-body -->
            </div>
            </div>
    <!-- /.card -->
</div>

<div class="col-lg-6">


<!--<div class="row">-->
<!--          <div class="col-md-12">-->
<!--            <div class="card card-default">-->
<!--              <div class="card-header">-->
<!--                <h3 class="card-title">Restaurant Images</h3>-->
<!--              </div>-->
<!--              <div class="card-body">-->
<!--              <div class="container" >-->
<!--   <div class='content'>-->
<!--    <form action="{{ url('admin/restaurants/uploadRestaurantImages') }}" class="dropzone" id="dropzonewidget">-->
<!--    @csrf-->
<!--    </form> -->
<!--   </div> -->
<!--  </div>-->
<!--             </div>-->
              <!-- /.card-body -->
<!--            </div>-->
            <!-- /.card -->
<!--        </div>-->


<!--</div>-->
<!-- /.col -->
</div>
<!-- /.row -->
<!-- /.container-fluid -->
</section>
<!-- /.content -->

</div>
@section('page_js')
<script src="{{ asset('assets') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>

<script>
Dropzone.autoDiscover = false;

$(document).ready(function () {
    bsCustomFileInput.init();
    $(".dropzone").dropzone({
        addRemoveLinks: true,
        removedfile: function(file) {
        var name = file.name; 
        
        $.ajax({
            type: 'POST',
            url: "{{ url('admin/restaurants/uploadRestaurantImages') }}",
            data: {name: name,request: 2},
            sucess: function(data){
                console.log('success: ' + data);
            }
        });
        var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        }
    });
});
</script>
@endsection
@include('admin.layouts.footer');

@endsection

