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
    <h1>Tables Reservation <span><small>List</small></span></h1>
    <a class="btn btn-primary mt-3" href="{{ url('admin/reservations/add') }}" >Add New</a>

    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Main</a></li>
        <li class="breadcrumb-item active">Reservation</li>
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
                          <th scope="col">Table</th>
                          <th class="text-center">User</th>
                          <th class="text-center">From</th>
                          <th class="text-center">To</th>
                          <th class="text-center" >Status</th>
                          <th class="text-center" >Price</th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>
  
                      <?php $i=1; ?>
                      @foreach($records as $key => $data)
                      <tr>
                          <th scope="row">{{ $key + $records->firstItem() }}</th>
                          <td>{{ getTableNameById($data->table_id) }}</a></td>
                          <td class="text-center">{{ getUserNameById($data->user_id) }}</td>
                          <td class="text-center">{{ $data->time_from }}</td>
                          <td class="text-center">{{ $data->time_to }}</td>
                          <td class="text-center"><?= $data->status == 'confirmed' ? '<span class="badge badge-success">Confirmed</span>' : '<span class="badge badge-danger">Not Confirmed</span>'; ?></td>
                          <td class="text-center">{{ $data->price }}</td>
                          <td class="project-actions text-right">
                            <a class="btn btn-danger btn-sm" href="{{ url('admin/reservations/delete') }}/{{$data->id}}">
                                <i class="fas fa-trash">
                                </i>
                            </a>
                            <a class="btn btn-warning btn-sm" href="{{ url('admin/reservations/show') }}/{{$data->id}}">
                                <i class="fas fa-edit">
                                </i>
                            </a>
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

