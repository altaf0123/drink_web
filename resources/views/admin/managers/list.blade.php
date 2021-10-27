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
    <h1>Managers <span><small>List</small></span></h1>
    <!--<a class="btn btn-primary mt-3" href="{{ url('admin/waiters/assign') }}" >Assign</a>-->

    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Main</a></li>
        <li class="breadcrumb-item active">Managers</li>
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
                          <th scope="col">Name</th>
                          <th class="text-center">Assigned Restaurant</th>
                      </tr>
                  </thead>
                  <tbody>
  
                      <?php $i=1; ?>
                      @foreach($records as $data)
                      <tr>
                          <th scope="row">{{ $data->id }}</th>
                        <td><a href='{{ url("admin/managers/assign") }}/{{$data->id}}' >{{ $data->name }}</a></td>
                        <td class="text-center">
                            <?= $data->restaurant_id == 0 || $data->restaurant_id == ""
                                ? '<span style="color:orange;" >Not assigned</span>' 
                                : ucwords(getRestaurantName($data->restaurant_id)); ?>
                        </td>
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

