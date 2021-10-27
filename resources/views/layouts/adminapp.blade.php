<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Drink Web</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets') }}/css/adminlte.min.css">
  <!-- Custom styles -->
  <link rel="stylesheeet" href="{{ asset('assets') }}/css/style.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/daterangepicker/daterangepicker.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
  <link rel='stylesheet' href='https://webprojectmockup.com/custom/dynisty/assets/admin/assets/css/pace-theme-flat-top.css' >
  <script src="{{ asset('assets') }}/js/pace.min.js"></script>
  <style>
    
    /****************** LATTTTERR ******************/
    .card-body {
        overflow-x: auto !important;
    }
    
    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link 
    {
    	color: #fff !important;
    	background-color: #333 !important;
    }
    
    .item {
    	position: relative;
    	float: left;
    }
    
    .item h2 {
    	text-align: center;
    	position: absolute;
    	line-height: 125px;
    	width: 100%;
    }
    
    .mysvg1,
    .mysvg2 {
    	-webkit-transform: rotate(-90deg) !important;
    	transform: rotate(-90deg) !important;
    }
    
    .circle_animation {
    	stroke-dasharray: 440;
    	/* this value is the pixel circumference of the circle */
    	stroke-dashoffset: 440;
    }
    
    .html .circle_animation {
    	-webkit-animation: html 1s ease-out forwards;
    	animation: html 1s ease-out forwards;
    }
    
    .css .circle_animation {
    	-webkit-animation: css 1s ease-out forwards;
    	animation: css 1s ease-out forwards;
    }
    
    @-webkit-keyframes html {
    	to {
    		stroke-dashoffset: 80;
    		/* 50% would be 220 (half the initial value specified above) */
    	}
    }
    
    @keyframes html {
    	to {
    		stroke-dashoffset: 80;
    	}
    }
    
    @-webkit-keyframes css {
    	to {
    		stroke-dashoffset: 160;
    	}
    }
    
    @keyframes css {
    	to {
    		stroke-dashoffset: 160;
    	}
    }
    
    a {
    	color: grey;
    	background-color: transparent;
    }
    
    a:hover {
    	color: orange;
    	background-color: transparent;
    }
    
    .flex.justify-between.flex-1.sm\:hidden {
    	display: none;
    }
    
    .w-5,
    .h-5 {
    	width: 20px;
    }
    
    .text-orange {
    	color: orange;
    }
    
    .content-wrapper {
        background: #fff;
    }
    .card {
        border-top: 2px solid orange;
    }
    thead th:first-child {
     border-radius: .25rem;
    }
    thead th:last-child {
      border-radius: .25rem;
    }

    .btn-primary  {
    	color: #333 !important;
    	background: orange !important;
    	border: 1px solid orange !important;
    }
    
    .btn-primary:hover {
    	color: #fff !important;
    	background: grey !important;
    	border: 1px solid grey !important;
    }
    
    @keyframes swing {
    	0%,
    	100% {
    		transform: rotate(-30deg);
    	}
    	20% {
    		transform: scale(.95);
    	}
    	50% {
    		transform: rotate(30deg);
    	}
    	80% {
    		transform: scale(.95);
    	}
    }
    
    #sweetlandia {
    	animation: swing 2s infinite ease-in-out;
    }
    
    .event {
    	margin: 50px auto;
    	text-align: center;
    }
  </style>
  @yield('page_css')
</head>
<body class="hold-transition sidebar-mini">

@yield('navs')
@yield('sidebar')
@yield('content')
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="{{ asset('assets') }}/js/adminlte.js"></script>
<script src="{{ asset('assets') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="{{ asset('assets') }}/plugins/toastr/toastr.min.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('assets') }}/plugins/chart.js/Chart.min.js"></script>
<script src="{{ asset('assets') }}/js/demo.js"></script>
<script src="{{ asset('assets') }}/js/pages/dashboard3.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('assets') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('assets') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
@yield('page_js')
<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>-->
<!--<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script>
    
  $(function() {
        var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 5000
        });
        @if(session()->has('success'))
          
            Toast.fire({
              icon: 'success',
              title: "{{ session()->get('success') }}"
            })
          
        @endif
        @if(session()->has('danger'))
          
            Toast.fire({
              icon: 'error',
              title: " {{ session()->get('danger') }}"
            })
          
        @endif
        
        $('.swalDefaultInfo').click(function() {
          Toast.fire({
            icon: 'info',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.swalDefaultError').click(function() {
          Toast.fire({
            icon: 'error',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.swalDefaultWarning').click(function() {
          Toast.fire({
            icon: 'warning',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.swalDefaultQuestion').click(function() {
          Toast.fire({
            icon: 'question',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
    
        $('.toastrDefaultSuccess').click(function() {
          toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultInfo').click(function() {
          toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultError').click(function() {
          toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultWarning').click(function() {
          toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
    
        $('.toastsDefaultDefault').click(function() {
          $(document).Toasts('create', {
            title: 'Toast Title',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.toastsDefaultTopLeft').click(function() {
          $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'topLeft',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.toastsDefaultBottomRight').click(function() {
          $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'bottomRight',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.toastsDefaultBottomLeft').click(function() {
          $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'bottomLeft',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.toastsDefaultAutohide').click(function() {
          $(document).Toasts('create', {
            title: 'Toast Title',
            autohide: true,
            delay: 750,
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.toastsDefaultNotFixed').click(function() {
          $(document).Toasts('create', {
            title: 'Toast Title',
            fixed: false,
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.toastsDefaultFull').click(function() {
          $(document).Toasts('create', {
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            icon: 'fas fa-envelope fa-lg',
          })
        });
        $('.toastsDefaultFullImage').click(function() {
          $(document).Toasts('create', {
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            image: '../../dist/img/user3-128x128.jpg',
            imageAlt: 'User Picture',
          })
        });
        $('.toastsDefaultSuccess').click(function() {
          $(document).Toasts('create', {
            class: 'bg-success',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.toastsDefaultInfo').click(function() {
          $(document).Toasts('create', {
            class: 'bg-info',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.toastsDefaultWarning').click(function() {
          $(document).Toasts('create', {
            class: 'bg-warning',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.toastsDefaultDanger').click(function() {
          $(document).Toasts('create', {
            class: 'bg-danger',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.toastsDefaultMaroon').click(function() {
          $(document).Toasts('create', {
            class: 'bg-maroon',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        
        var path = "{{ url('admin/search') }}";
        $('input.typeahead').typeahead({
            source:  function (query, process) {
            return $.get(path, { str: query }, function (data) {
                    return process(data);
                });
            }
        });
  });
  
</script>
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script>
$(document).ready(function(){
    Pace.restart()
    $(":input").inputmask();
});
</script>
</body>
</html>
