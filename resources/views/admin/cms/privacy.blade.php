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
               <h1>Update Terms</h1>
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
            <div class="col-lg-6">
               <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                     <form class="form-horizontal form-label-left" method="POST" action="{{ url('admin/cms/privacy') }}/{{$records->id}}"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <textarea id="summernote">
                            Place <em>some</em> <u>text</u> <strong>here</strong>
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
<script src="{{ asset('assets') }}/plugins/summernote/summernote-bs4.min.js"></script>
<script src="{{ asset('assets') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
   $(document).ready(function () {
     bsCustomFileInput.init();
   });
</script>
@endsection
@include('admin.layouts.footer');
@endsection