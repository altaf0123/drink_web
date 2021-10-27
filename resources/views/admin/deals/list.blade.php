@extends('layouts.adminapp')
@section('content')

@include('admin.layouts.nav')  
@include('admin.layouts.sidebar')
<div class="content-wrapper" style="min-height: 2077.69px;">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-8">
    <h1>Deals <span><small>List</small></span></h1>
       <a class="btn btn-primary mt-3" href="{{ url('admin/deals/add') }}" >Add New Deal</a>

    </div>
    <div class="col-sm-4">
        <!--<form class="form-inline" action="{{ route('products_admin.search') }}" method="GET">-->
        <!--    <input class="form-control mr-sm-2" type="search" -->
        <!--      placeholder="Search Product Name" name="query" value="{{ request()->input('query') }}" required>-->
        <!--    <span class="text-danger">@error('query'){{ $message }} @enderror</span>-->
        <!--    <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class='fa fa-search'></i></button>-->
        <!--</form>-->
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
                  <thead class="thead-dark" >
                      <tr>
                          <th scope="col" width="10%">#</th>
                          <th scope="col">Deal Title</th>
                          <th scope="col" width="35%">Deal Type</th>
                          <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
  
                      <?php $i=1; ?>
                      @foreach($records as $data)
                      <tr>
                          <th scope="row"><?php echo $i++; ?></th>
                          <td>
                          <a href="{{ url('admin/deals/view') }}/{{ $data->id }}" >{{ $data->title }}</a>
                          </td>
                          <td>
                          {{ $data->type ?? "-" }}
                          </td>
                          <td>
                            <a class="btn btn-danger btn-sm" href="{{ url('admin/deals/delete') }}/{{$data->id}}">
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

