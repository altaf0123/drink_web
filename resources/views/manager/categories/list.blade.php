@extends('layouts.adminapp')
@section('content')

@include('manager.layouts.nav')  
@include('manager.layouts.sidebar')
<div class="content-wrapper" style="min-height: 2077.69px;">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
    <h1>Categories <span><small>List</small></span></h1>
   <!--<a class="btn btn-primary mt-3" href="{{ url('admin/categories/add') }}" >Add New Category</a>-->

    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Categories</li>
      </ol>
    </div>
  </div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          @if(!$records->isEmpty())
          <table class="table mb-5" width="100%">
                  <thead class="thead-light">
                      <tr>
                          <th scope="col" width="10%">#</th>
                          <th width="40%">Category Name</th>
                          <!--<th >Category Type</th>-->
                      </tr>
                  </thead>
                  <tbody>
  
                      <?php $i=1; ?>
                      @foreach($records as $key => $data)
                      <tr>
                          <th scope="row">{{ $key+ $records->firstItem() }}</th>
                          <td><a href='{{ url("manager/categories/view") }}/{{$data->id}}'>{{ $data->title }}</a></td>
                          <!--<td>{{ get_name_by_id('types', 'types_name', array('id'=>$data->type)) }}</td>-->
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            @else
              <h1>No record found</h1>

            @endif                
            <div class="d-flex justify-content-center">
                {!! $records->links() !!}
            </div>
        </div>
        <!-- /.card-body -->
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

@endsection
@include('admin.layouts.footer');

@endsection

