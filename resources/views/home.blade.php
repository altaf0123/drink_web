@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <center>
                <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()" class="btn btn-danger btn-xs btn-flat">Allow for Notification</button>
            </center>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
  
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
  
                    <form action="{{ route('send.notification') }}" method="POST" id="myForm">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Body</label>
                            <textarea class="form-control" name="body"></textarea>
                          </div>
                        <button class="btn btn-primary">Send Notification</button>
                    </form>
  
                </div>
            </div>
        </div>
    </div>
</div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script>
  
    const firebaseConfig = {
         apiKey: "AIzaSyBM22gcJCxSQLNAQPFrjxE-rbffe8GiCro",
          authDomain: "drinkweb-b94ea.firebaseapp.com",
          projectId: "drinkweb-b94ea",
          storageBucket: "drinkweb-b94ea.appspot.com",
          messagingSenderId: "240265625888",
          appId: "1:240265625888:web:55bd99daace079f472d745",
          measurementId: "G-EW8G5Y620Y"
    };

    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    
    navigator
    .serviceWorker
    .register('./firebase-messaging-sw.js')
    .then((registration) => {
        messaging.useServiceWorker(registration);
    });
    
    function initFirebaseMessagingRegistration() {
            messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function(token) {
                $.ajax({
                    url: '{{ route("save-token") }}',
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "token": token
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        alert('Token saved successfully.');
                    },
                    error: function (err) {
                        console.log('User Chat Token Error'+ err);
                    },
                });
  
            }).catch(function (err) {
                console.log('User Chat Token Error'+ err);
            });
    }  
    
    $("#myForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: "{{ route('send.notifications') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "title": 'test',
                "bodu": 'body'
            },
            dataType: 'JSON',
            success: function (response) {
                alert('Notified saved successfully.');
            },
            error: function (err) {
                console.log('User Chat Token Error'+ err);
            },
        });
    });
    
    messaging.onMessage(function(payload) {
        toastr.info(payload.notification.title);
        // const noteTitle = payload.notification.title;
        // const noteOptions = {
        //     body: payload.notification.body,
        //     icon: payload.notification.icon,
        // };
        // new Notification(noteTitle, noteOptions);
    });
    
   
</script>
@endsection