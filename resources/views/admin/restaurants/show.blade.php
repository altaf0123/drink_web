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
               <h1>Update Restaurant</h1>
               <a onclick="window.history.back();" class="btn btn-primary mt-3">Back to List</a>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Main</a></li>
                    <li class="breadcrumb-item active">Restaurants</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-6">
               <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                     <form class="form-horizontal form-label-left" method="POST" action="{{ url('admin/restaurants/update') }}/{{$records->id}}"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="form-group">
                           <label>Bar Name</label>
                           <input type="text" class="form-control" name="name" placeholder="Name" 
                              value="{{ $records->name }}">
                        </div>
                        <div class="form-group">
                           <label>Address</label>
                           <input type="address" class="form-control" name="address" placeholder="Address" 
                              value="{{ $records->address }}">
                        </div>
                        <div class="form-group">
                           <label>Lat</label>
                           <input type="text" class="form-control" name="lat" placeholder="Latitude" 
                              value="{{ $records->lat }}">
                        </div>
                        <div class="form-group">
                           <label>Long</label>
                           <input type="text" class="form-control" name="long" placeholder="Longitude" 
                              value="{{ $records->long }}">
                        </div>

                        <div class="form-group" >
                            <label>User</label>
                            <select name="user_id" class="form-control">
                                @foreach(get_web_users() as $row)
                                    <option value='{{ $row->id }}' <?php echo $records->id == $row->restaurant_id ? 'selected' : ''; ?>>{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group" >
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Restaurant Images</button>
                        </div>
                        <div class="card-footer mb-4">
                           <button type="submit" class="btn btn-primary">Go <i class="fas fa-arrow-right"></i></button>
                        </div>
                     </form>
                  </div>
                  <!-- /.card-body -->
               </div>
            </div>
            
            
            <div class="col-lg-6">
               <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="filter-container p-0 row">
                        <?php $data = get_list('restaurant_pictures', array('restaurant_id'=> collect(request()->segments())->last() )); ?>
                        <?php if(!empty($data)): ?>
                        <?php foreach($data as $row): 
                            $url = explode('/',url('/'));
                            $url = $url[0]."//".$url[1].$url[2].'/drinkapp_mobile/public/uploads/restaurants/';
                        ?>
                          <div class="col-sm-2">
                            <a href="<?= $url . '/'.$row->picture; ?>" data-toggle="lightbox" data-title="" data-gallery="gallery">
                              <img src="<?= $url . '/'.$row->picture; ?>" class="img-fluid mb-2" alt="{{ $row->picture }}" style="object-fit: cover;width: 150px !important; height: 80px !important;">
                            </a>
                            <center><a href='{{ url("admin/restaurants/DeleteGet") }}/{{ $row->id }}'><i class="fa fa-trash"></i></a></center>
                          </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <p>No images found</p>
                        <?php endif; ?>
                    </div>
                  </div>
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

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Restaurant</h5>
      </div>
      <div class="modal-body">
        <form method="post" action="{{url('admin/restaurants/uploadRestaurantImages')}}" enctype="multipart/form-data" 
                          class="dropzone" id="dropzone">
            @csrf
            <input type="hidden" value="{{$records->id}}" name="rest_id">
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@section('page_js')
<script src="{{ asset('assets') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

<link rel="stylesheet" href="https://adminlte.io/themes/dev/AdminLTE/plugins/ekko-lightbox/ekko-lightbox.css">
<script src="https://adminlte.io/themes/dev/AdminLTE/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script>
   $(document).ready(function () {
     bsCustomFileInput.init();
   });
</script>
<script type="text/javascript">
$(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
});
        Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 50000,
            removedfile: function(file) 
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                    type: 'POST',
                    url: '{{ url("admin/restaurants/fileDestroy") }}',
                    data: {filename: name},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
       
            success: function(file, response) 
            {
                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            }
};
</script>
@endsection
@include('admin.layouts.footer');
@endsection