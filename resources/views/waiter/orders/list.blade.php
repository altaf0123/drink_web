@extends('layouts.adminapp')
@section('content')

@include('waiter.layouts.nav')  
@include('waiter.layouts.sidebar')
<div class="content-wrapper" style="min-height: 2077.69px;">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
  
    <div class="col-sm-6">
    <h1>Orders <span><small>List</small></span></h1>

    </div>
    <div class="col-sm-6">
        <form class="form-inline my-2 my-lg-0" action="{{ route('orders_waiter.search') }}" method="GET">
            <select class="form-control mr-sm-2" name="search_type">
                  <option @if (isset($search_type) && $search_type== 'date') selected="selected" @endif value="date">Search By Date</option>
                  <option @if (isset($search_type) && $search_type== 'id') selected="selected" @endif value="id">Search By Transaction ID</option>
                  <option  @if (isset($search_type) && $search_type== 'customer') selected="selected" @endif value="customer">Search By Customer Name</option>
            </select>
            <input class="form-control mr-sm-2" type="search" 
              placeholder="Search By Order ID/Date" name="query" value="{{ request()->input('query') }}" required>
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
                          <th scope="col" width="10%">Order ID</th>
                          <!--<th scope="col">Customer</th>-->
                          <th scope="col">Created At</th>
                          <th scope="col">Delivered At</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Grand Total</th>
                          <th width="10%"></th>
                      </tr>
                  </thead>
                  <tbody>
  
                      <?php $i=1; ?>
                      @foreach($records as $data)
                      <tr>
                          <td>{{ $data->id }}</td>
                          <td>{{ $data->created_at }}</td>
                          <td>{{ $data->delivered_at ? $data->delivered_at : 'Not yet'}}</td>
                          <td class="text-center">
                            <?php 
                            if($data->order_status == 'completed'): ?>
                              <a href="{{ url('waiter/orders/toComplete') }}/{{ $data->id }}" >
                                <span class="swalDefaultSuccess badge badge-success">Completed</span>
                              </a>
                            <?php else: ?>
                              <a href="{{ url('waiter/orders/toPending') }}/{{ $data->id }}" >
                                <span class="swalDefaultSuccess badge badge-info">Pending</span>
                              </a>                                
                            <?php endif; ?>
                          </td>
                          <td class="text-center">${{ $data->grand_total }}</td>
                          <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{ url('waiter/orders/view') }}/{{$data->id}}">
                                <i class="fas fa-folder">
                                </i>
                                View
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
@include('waiter.layouts.footer');

@endsection

