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
               <h1>Update Table</h1>
                <a  href="{{ url('user/tables') }}" class="btn btn-primary mt-3">Back to List</a>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ url('user') }}">Main</a></li>
                  <li class="breadcrumb-item active">Tables</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-6">
               <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                     <form class="form-horizontal form-label-left" method="POST" action="{{ url('user/tables/update') }}/{{$records->id}}"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="form-group">
                           <label>Table Name *</label>
                           <input type="text" class="form-control" name="table_name" placeholder="Table Name" 
                              value="{{ $records->table_name }}">
                        </div>
                        <div class="form-group">
                           <label>Price *</label>
                           <input type="text" class="form-control" name="price" placeholder="Price" 
                              value="{{ $records->price }}">
                        </div>
                        <div class="form-group">
                           <label>Table Description *</label>
                           <textarea class="form-control" name="description" row="100">
                           {{ $records->description }}
                           </textarea>
                        </div>
                        <div class="form-group">
                           <label>Table Image </label>
                           <br>
                           <img src="<?php echo !empty($records->picture)
                              ? $url.'/tables/'.$records->picture 
                              : 'https://via.placeholder.com/200/333/fff?text=Not found'; ?>"
                              class="img-fluid mb-2 border border-warning" name="description" width="250" height="250">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" name="table_image" value="{{ $records->picture }}">
                              <label class="custom-file-label" for="customFile">{{ $records->picture }}</label>
                              <input type="hidden" name="table_img" value="{{ $records->picture }}" >
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Seating Capacity *</label>
                           <input type="text" class="form-control" name="seating_capacity"
                              value="{{ $records->seating_capacity }}" placeholder="Seating Capacity" >
                        </div>
                        <div class="form-group">
                            <label>Status  </label>
                            <select class="form-control" name="status">
                                <option value="1" {{ $records->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="2" {{ $records->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="card-footer mb-4">
                           <button type="submit" class="btn btn-primary">Go <i class="fas fa-arrow-right"></i></button>
                        </div>
                     </form>
                  </div>
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
@include('bar.layouts.footer');
@endsection