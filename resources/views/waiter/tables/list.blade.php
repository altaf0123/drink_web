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
    <h1>Tables <span><small>List</small></span></h1>
    <a class="btn btn-primary mt-3" href="{{ url('user/tables/add') }}" >Add New</a>

    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
    <div class="col-lg-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          @if(!$records->isEmpty())
          <table class="table mb-5" width="100%">
                  <thead class="thead-light">
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Table Name</th>
                          <th class="text-center">Restaurant</th>
                          <th class="text-center">Seating Capacity</th>
                          <th class="text-center">Price</th>
                          <th class="text-center" >Status</th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>
  
                      <?php $i=1; ?>
                      @foreach($records as $data)
                      <tr>
                          <th scope="row"><?php echo $i++; ?></th>
                          <td><a href='{{ url("user/tables/show") }}/{{ $data->id }}' >{{ $data->table_name }}</a></td>
                          <td class="text-center">{{ getRestaurantName($data->restaurant_id) }}</td>
                          <td class="text-center">{{ $data->seating_capacity }}</td>
                          <td class="text-center">${{ $data->price }}</td>
                          <td class="text-center">{{ $data->status }}</td>
                          <td class="project-actions text-right">
                            <a class="btn btn-danger btn-sm" href="{{ url('user/tables/delete') }}/{{$data->id}}">
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
@include('bar.layouts.footer');

@endsection

