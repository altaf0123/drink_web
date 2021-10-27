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
    <h1>Users <span><small>Ledger</small></span></h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Main</a></li>
        <li class="breadcrumb-item active">Ledger</li>
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
                          <th>Total Orders</th>
                          <th>Total Profit</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    @foreach($records as $data)
                    <tr>
                        <th scope="row"><?php echo $i++; ?></th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td class="text-center">
                            {{ $data->TotalOrders }}
                        </td>
                        <td class="project-actions text-right">
                          {{ $data->Profit }}
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

