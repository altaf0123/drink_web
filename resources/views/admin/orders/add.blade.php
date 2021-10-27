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
<h1>Add New Order</h1>
<button class="btn btn-primary mt-3">Back to List</button>

</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Orders</li>
    </ol>
</div>
</div>
</div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-6">
    <div class="card">
    <!-- /.card-header -->
                <div class="card-body">
                    <form class="form-horizontal form-label-left" method="POST" action="{{ url('admin/orders/add') }}"
                                  enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="form-group">

                            <div class="row" x-data="handler()">
<div class="col">
<table class="table table-bordered align-items-center table-sm">
  <thead class="thead-light">
   <tr>
     <th>#</th>
     <th>Products</th>                            <th>Quantity</th>
     <th></th>
    </tr>
  </thead>
  <tbody>
    <template x-for="(field, index) in fields" :key="index">
     <tr>
      <td x-text="index + 1"></td>
      <td>
        <select x-model="field.txt1" type="text" name="item_id[]" class="form-control">
            <option value="">Choose Product</option>
            @foreach(getListProducts() as $row)
                <option value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
        </select>
      </td>
      <td><input x-model="field.txt2" type="text" name="qty[]" class="form-control"></td>
       <td><button type="button" class="btn btn-danger btn-small" @click="removeField(index)">&times;</button></td>
    </tr>
   </template>
  </tbody>
  <tfoot>
     <tr>
       <td colspan="4" class="text-right"><button type="button" class="btn btn-default" @click="addNewField()">+ Add Row</button></td>
    </tr>
  </tfoot>
</table>
</div>
</div>








                     </div>
                        <div class="form-group">
                            <label>User</label>
                            <select class="form-control" name="user_id">
                                @foreach(getListUsers() as $row)
                                  <option value="{{ $row->id }}" >
                                  {{ $row->name }}
                                  </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sub Total</label>
                            <input type="text" class="form-control" name="sub_total" placeholder="Sub Total" >
                        </div>
                        <div class="form-group">
                            <label>Grand Total</label>
                            <input type="text" class="form-control" name="grand_total" placeholder="Grand Total" >
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="order_status">
                                <option value="">Choose Type</option>
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</table>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pay Status</label>
                            <select class="form-control" name="payment_status">
                                <option value="">Choose Type</option>
                                <option value="unpaid">Unpaid</option>
                                <option value="paid">Paid</table>
                            </select>
                        </div>

                        <div class="card-footer mb-4">
                        <button type="submit" class="btn btn-primary">Go <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </form>
                <!-- /.card-body -->
            </div>
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
<script src="{{ asset('assets') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<script>
$(document).ready(function () {
  bsCustomFileInput.init();
});
function handler() {
    return {
      fields: [],
      
      addNewField() {
            this.fields.push({
                txt1: '',
                txt2: ''
            });
        },
        removeField(index) {
           this.fields.splice(index, 1);
         }
      }
 }
</script>
@endsection
@include('admin.layouts.footer');

@endsection

