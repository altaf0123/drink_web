@extends('layouts.adminapp')
@section('content')

@include('admin.layouts.nav')  
@include('admin.layouts.sidebar')
<div class="content-wrapper" style="min-height: 2077.69px;">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-7">
            <h1>Orders <span><small>List</small></span></h1>
            <!--<a class="btn btn-primary mt-3" href="{{ url('admin/orders/add') }}" >Add New</a>-->
        
        </div>
        <div class="col-sm-5">
            <form class="form-inline my-2 my-lg-0" action="{{ route('web_admin.search') }}" method="GET">
                <select class="form-control mr-sm-2" name="search_type">
                      <option @if (isset($search_type) && $search_type== 'date') selected="selected" @endif value="date">Search By Date</option>
                      <option @if (isset($search_type) && $search_type== 'id') selected="selected" @endif value="id">Search By Transaction ID</option>
                      <option @if (isset($search_type) && $search_type== 'customer') selected="selected" @endif value="customer">Search By Customer Name</option>
                      <option @if (isset($search_type) && $search_type== 'rest') selected="selected" @endif value="rest">Search By Restaurant</option>
                </select>
                <input class="form-control mr-sm-2" type="search" 
                  placeholder="Search By Order ID/Date" name="query" value="{{ request()->input('query') }}" required>
                <span class="text-danger">@error('query'){{ $message }} @enderror</span>
                <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class='fa fa-search'></i></button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
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
                  <thead class="thead-light" >
                      <tr>
                          <th scope="col" width="10%">Order ID</th>
                          <!--<th scope="col">Restaurant Name</th>-->
                          <th scope="col">Date</th>
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
                          <!--<td>-->
                          <!--  <a href='' id="modalBtn" data-dd="2" data-toggle="modal" data-target="#chartModal" >-->
                          <!--  {{ get_name_by_id('restaurants', 'name', array('id'=>get_name_by_id('users', 'restaurant_id', array('id'=>$data->user_id)))) }}-->
                          <!--  </a>-->
                          <!--</td>-->
                          <td>{{ $data->created_at }}</td>
                          <td class="text-center">
                          <?php if($data->payment_status == 'paid'): ?>
                          <span class="badge badge-success">Paid</span>
                          <?php else: ?> 
                          <a href="{{ url('admin/orders/toPaid') }}/{{ $data->id }}" ><span class="badge badge-danger">Unpaid</span></a>
                          <?php endif; ?>
                          </td>
                          <td class="text-center">${{ $data->grand_total }}</td>
                          <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{ url('admin/orders/view') }}/{{$data->id}}">
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

  <div class="modal fade" id="chartModal" role="dialog">
    <div class="modal-dialog">   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
           <div id="chartContainer" style="height: 360px; width: 100%;"></div>
        </div>
      </div>
    </div>
  </div>
@section('page_js')
<script>
window.onload = function () {
    
    $('#chartModal').on('shown.bs.modal', function () {
        var rest_id = $(this).attr('data-dd');
        console.log(rest_id);
        $.ajax({
            url     : '{{ url("admin/orders/order_chart_by_restaurant") }}/7',
            method  : 'get',
            dataType : 'JSON',
            cache: false,
            success : function(response){
                    console.log();
                    var chart = new CanvasJS.Chart("chartContainer", {        
                    data: [
                    {
                          type: "column",
                          dataPoints: [
                            { label: "Jan", y: response.month == 1 ? response.total : 0 },
                            { label: "Feb", y: response.month == 2 ? response.total : 0 },
                            { label: "Mar", y: response.month == 3 ? response.total : 0 },
                            { label: "Apr", y: response.month == 4 ? response.total : 0 },
                            { label: "May", y: response.month == 5 ? response.total : 0 },
                            { label: "June", y: response.month == 6 ? response.total : 0 },
                            { label: "July", y: response.month == 7 ? response.total : 0 },
                            { label: "Aug", y: response.month == 8 ? response.total : 0 },
                            { label: "Sept", y: response.month == 9 ? response.total : 0 },
                            { label: "Oct", y: response.month == 10 ? response.total : 0 },
                            { label: "Nov", y: response.month == 11 ? response.total : 0 },
                            { label: "Dec", y: response.month == 12 ? response.total : 0 }
                          ]
                        }         
                      ]
                    });
                  chart.render();
            }
        });

    });

}
</script>
@endsection
@include('admin.layouts.footer');

@endsection

