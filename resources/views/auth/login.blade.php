@extends('layouts.app')

@section('content')
<div class="login-box" style="border: 0px solid black;
    padding: 2rem;">
  <div class="login-logo">
    <img src="{{ asset('assets/img') }}/logo.png" width="250">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form action='{{ route("login") }}' id="myForms" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required autocomplete="current-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="row">
            <input type="hidden" id="my_token">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-lg-4 col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-1">
        <a href="{{ route('forget.password.get') }}">I forgot my password</a>
      </p>
      <!--<p class="mb-0">-->
      <!--  <a href="{{ route('register') }}" class="text-center">Register a new membership</a>-->
      <!--</p>-->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<style>
  .login-box {
    margin-left: auto;
    margin-right: auto;
  }

  .login-box img {
    max-width: 200px;
    width: 100%;
  }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script>
    // $("#myForms").on('submit',function(e){
    //     e.preventDefault();
    //     var email = $("#email").val();
    //     var password = $("#password").val();
    //     fetch('{{ route("login") }}', {
    //         method: 'POST',
    //         headers: {
    //             'Accept': 'application/json',
    //             'Content-Type': 'application/json'
    //         },
    //         body: JSON.stringify({'_token': '{{ csrf_token() }}', 'email': email, 'password': password})
    //     }).then(response => response.json())
    //       .then(response => {
    //             if(response)
    //             {
    //                 if (response.role == 'admin') {
    //                     window.location = "./admin";
    //                 }
    //                 if (response.role == 'user') {
    //                     window.location = "./user";
    //                 }
    //                 if (response.role == 'waiter') {
    //                     window.location = "./waiter";
    //                 }
    //                 if (response.role == 'manager') {
    //                     window.location = "./manager";
    //                 }
    //             } 
    //             if(response == 0){
    //                 toastr.error('No restaurant assigned');    
    //                 setTimeout(() => { 
    //                     window.location = "./";
    //                 },2000);
    //             }
    //       });
    // });
</script>
@endsection