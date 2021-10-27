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
    <h1>Restaurant <span><small>List</small></span></h1>
    <a class="btn btn-primary mt-3" href="{{ url('admin/restaurants/add') }}" >Add New</a>

    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Main</a></li>
        <li class="breadcrumb-item active">Restaurants</li>
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
                          <th scope="col">Bar Name</th>
                          <th scope="col">Owner</th>
                          <th class="text-center">Status</th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    @foreach($records as $data)
                    <tr>
                        <th scope="row"><?php echo $i++; ?></th>
                        <td><a href='{{ url("admin/restaurants/show") }}/{{ $data->id }}' >{{ $data->name }}</a></td>
                        <td><?= get_name_by_id('users', 'name', array('restaurant_id'=>$data->id,'role'=>'user')) ?? "<span style='color:orange;' >Not Assigned</span>"; ?></td>
                        <td class="text-center">
                        <?php 
                            if($data->status == 1): ?>
                                <a href="{{ url('admin/restaurants/toPending') }}/{{ $data->id }}" ><span class="swalDefaultSuccess badge badge-success">Active</span></a>
                            <?php else: ?>
                                <a href="{{ url('admin/restaurants/toComplete') }}/{{ $data->id }}" ><span class="swalDefaultSuccess badge badge-danger">Disabled</span></a>
                          <?php endif; 
                          ?>
                        </td>
                        <td class="project-actions text-right">
                          <a class="btn btn-danger btn-sm" href="{{ url('admin/restaurants/delete') }}/{{$data->id}}">
                              <i class="fas fa-trash">
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

