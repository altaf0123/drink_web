@extends('layouts.adminapp')
@section('content')

@include('bar.layouts.nav')  
@include('bar.layouts.sidebar')
<?php 
    $url = explode('/',url('/'));
    $url = $url[0]."//".$url[1].$url[2].'/drinkapp_mobile/public/uploads/';
?>
<div class="content-wrapper" style="min-height: 2077.69px;">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-8">
    <h1>Products <span><small>List</small></span></h1>
   <a class="btn btn-primary mt-3" href="{{ url('user/products/add') }}" >Add New Product</a>

    </div>
    <div class="col-sm-4">
        <form class="form-inline" action="{{ route('products_user.search') }}" method="GET">
            <input class="form-control mr-sm-2" type="search" 
              placeholder="Search Product Name" name="query" value="{{ request()->input('query') }}" required>
            <span class="text-danger">@error('query'){{ $message }} @enderror</span>
            <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class='fa fa-search'></i></button>
        </form>
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
                          <th width="40%">Name</th>
                          <th >Category</th>
                          <th class="text-center">Unit Price</th>
                          <th width="10%"></th>
                      </tr>
                  </thead>
                  <tbody>
  
                      <?php $i=1; ?>
                      @foreach($records as $data)
                      <tr>
                          <th scope="row"><?php echo $i++; ?></th>
                          <td>
                          @if(empty($data->picture))
                          <img class="table-avatar" width='40' src="{{ url('img/sample.jpg') }} ">
                          <a href="{{ url('user/products/view') }}/{{ $data->id }}" >{{ $data->name }}</a>
                          @else
                          <img class="table-avatar" width='40' height="20" src="{{ $url . 'products' }}/{{ $data->picture }}"> 
                          <a href="{{ url('user/products/view') }}/{{ $data->id }}" >{{ $data->name }}</a>
                          @endif
                          </td>
                          <td>{{ getCatName($data->cat_id) }}</td>
                          <td class="text-center">${{ $data->price }}</td>
                          <td class="project-actions text-right">
                            <a class="btn btn-danger btn-sm" href="{{ url('user/products/delete') }}/{{$data->id}}">
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

