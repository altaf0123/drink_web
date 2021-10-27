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
    <h1>Users <span><small>Ledger</small></span></h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Main</a></li>
        <li class="breadcrumb-item active">Users</li>
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
          @if(!empty($records))
          <table class="table mb-5" width="100%">
                  <thead class="thead-light">
                      <tr>
                          <th width="10%">#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th class="text-center">Total Orders</th>
                          <th class="text-center">Total Profit (Grand Total + Tip)</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    @foreach($records as $key => $data)
                    <tr>
                        <th scope="row">{{ $records->firstItem() + $key }}</th>
                        <td>{{ $data->name ?? "Not Found" }}</td>
                        <td>{{ $data->email ?? "Not Found" }}</td>
                        <td class="text-center">
                            {{ $data->TotalOrders ?? "Not Found" }}
                        </td>
                        <td class="project-actions text-center">
                          {{ $data->Profit ?? "Not Found" }}
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

