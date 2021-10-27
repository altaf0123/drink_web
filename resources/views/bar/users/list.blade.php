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
    <a class="btn btn-primary mt-3" href="{{ url('user/users/add') }}?type=waiter" >Add New</a>

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
                          <th class="text-center">Role</th>
                          <th class="text-center">Status</th>
                          <th class="text-center" >Verify Status</th>
                          <th class="text-center">Created At</th>
                          <!--<th width="10%"></th>-->
                      </tr>
                  </thead>
                  <tbody>
  
                      <?php $i=1; ?>
                      @foreach($records as $data)
                        <tr>
                            <th scope="row">{{ $data->id }}</th>
                            <td><a href="{{ url('user/users/view') }}/{{ $data->id }}" >
                                {{ $data->name }}
                            </a>
                            </td>
                            <td class="text-center">{{ ucwords($data->role) }}</td>
                            <td class="text-center">
                                <?php if($data->account_status == 'active'): ?>
                                    <a href='{{ url("user/users/toComplete") }}/{{ $data->id }}' ><span class="badge badge-success">Active</span></a>
                                <?php else: ?>
                                    <a href='{{ url("user/users/toPending") }}/{{ $data->id }}' ><span class="badge badge-danger">Inactive</span></a>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if($data->account_verified == 1): ?>
                                    <a href='{{ url("user/users/toVerifyPending") }}/{{ $data->id }}' ><span class="swalDefaultSuccess badge badge-success">Verified</span></a>
                                <?php else: ?>
                                    <a href='{{ url("user/users/toVerifyComplete") }}/{{ $data->id }}' ><span class="swalDefaultSuccess badge badge-danger">Unverified</span></a>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">{{ $data->created_at }}</td>
                        <!--    <td class="project-actions text-right">-->
                            <!--<a class="btn btn-danger btn-sm" href="{{ url('user/users/delete') }}/{{$data->id}}">-->
                            <!--    <i class="fas fa-trash">-->
                            <!--    </i>-->
                            <!--</a>-->
                        <!--</td>-->
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


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="dash">
             <!-- Content goes in here -->
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
@section('page_js')
<script>
$('#exampleModalCenter').on('show.bs.modal', function (event) {
 
    var id = $(this).data('id');

    $.ajax({
        type: "GET",
        url: "{{ url('user/users/get_user_detail') }}",
        data: {id: id},
        cache: true,
        success: function (data) {
            modal.find('.dash').html(data);
        },
        error: function(err) {
            console.log(err);
        }
    });  
});
</script>
@endsection
@include('admin.layouts.footer');

@endsection

