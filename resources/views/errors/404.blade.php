<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#333">
    <title>Page Not found</title>
    <meta name="description" content="Material Style Theme">
    <link rel="shortcut icon" href="{{ asset('public/assets/img/favicon.png?v=3') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('public/assets/css/preload.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.light-blue-500.min.css') }}">
  </head>
  <body>
    <div id="ms-preload" class="ms-preload">
      <div id="status">
        <div class="spinner">
          <div class="dot1"></div>
          <div class="dot2"></div>
        </div>
      </div>
    </div>
    <div class="bg-full-page bg-primary back-fixed">
      <div class="mw-500 absolute-center">
        <div class="card animated zoomInUp animation-delay-7 color-primary withripple" style="padding: 10px 0;">
          <div class="card-body">
            <div class="text-center color-dark">
              <img src="{{ asset('public/assets/img/logo/logonewcambridge.png') }}" alt="">
              <h2 class="color-primary text-big">404 Page Not Found</h2>
              <p class="lead lead-sm">We have not found what you are looking for.<br>We have put our robots to search.</p>
              <a href="{{ url('/home') }}" class="btn btn-primary btn-raised"><i class="zmdi zmdi-home"></i> Go Home</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('public/assets/js/plugins.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/app.min.js') }}"></script>
  </body>
</html>