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
               <h1>Update {{ ucwords(Request::segment(4)) }}</h1>
               <button class="btn btn-primary mt-3">Back to List</button>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Terms</li>
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
            <div class="col-lg-8">
               <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                     <form class="form-horizontal" method="POST" action="{{ url('admin/cms/show') }}/{{ $type }}"
                       novalidate>
                        @csrf
                        <textarea id="summernote" rows="4" cols="50" name="{{ $type }}">
                           {{ $records }}
                        </textarea>
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
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
   $(document).ready(function () {
     bsCustomFileInput.init();
     $('#summernote').summernote({
      height: 400
     });
   });
</script>
@endsection
@include('admin.layouts.footer');
@endsection