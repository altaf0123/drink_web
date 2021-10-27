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
    <h1>Waiters <span><small>List</small></span></h1>
    <!--<a class="btn btn-primary mt-3" href="{{ url('admin/waiters/assign') }}" >Assign</a>-->

    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('user') }}">Main</a></li>
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
    <div class="col-lg-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          @if(!$records->isEmpty())
          <table class="table mb-5" width="100%">
                  <thead class="thead-light">
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th class="text-center">Assigned Restaurant</th>
                      </tr>
                  </thead>
                  <tbody>
  
                      <?php $i=1; ?>
                      @foreach($records as $data)
                      <tr>
                          <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->name }}</td>
                        <td class="text-center">
                              {{ ucwords(getRestaurantName($data->restaurant_id)) }}
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

