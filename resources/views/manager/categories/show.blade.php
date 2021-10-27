@extends('layouts.adminapp')
@section('content')

@include('manager.layouts.nav')  
@include('manager.layouts.sidebar')
<div class="content-wrapper" style="min-height: 2077.69px;">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Update Category</h1>
<a class="btn btn-primary mt-3" href="{{ url()->previous() }}">Back to List</a>

</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ url('user') }}">Main</a></li>
    <li class="breadcrumb-item active">Categories</li>
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
    @if(!empty($records))
    <!-- /.card-header -->
                <div class="card-body">
                    <form class="form-horizontal form-label-left" method="POST" action="{{ url('manager/categories/update') }}/{{$records->id}}"
                                  enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="form-group">
                            <label>Category Name *</label>
                            <input type="text" class="form-control" name="title" placeholder="Cat Name" value="{{ $records->title }}">
                        </div>
                        <div class="form-group">
                            <label>Type *</label>
                            <select class="form-control" name="type">
                                @foreach(get_list('types') as $row)
                                <option value="{{ $row->id }}" <?php echo $records->type == $row->types_name ? 'selected':''; ?>>
                                    {{ $row->types_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="card-footer mb-4">
                        <button type="submit" class="btn btn-primary">Go <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </form>
                <!-- /.card-body -->
            </div>
    @endif
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

