<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('public/assets/img/logo/newcambridge-logo_bar.png') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/kanit-master/css/fonts.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/css/preload.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.light-blue-800.min.css') }}" />
    <link href="{{ asset('public/assets/css/jquery.alerts.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('public/css/style-custom.css') }}">
    @yield('css')
    <title>Clubs Registration</title>
</head>
<body>
    <!-- Spinner -->
    <div id="ms-preload" class="ms-preload">
        <div id="status">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>

    @if(session()->has('condition'))
        @include('components.side-bar')
    @endif

    <!-- Content -->
    <div class="sb-site-container">

        @include('components.menu')
        
        <div class="container content-wrapper">
            <div class="row">
                @yield('content')
            </div>
        </div>

        <footer class="ms-footer" id="contact">
            <div class="container">
                <address class="no-mb">
                <p style="color:#FFF;">
                    <i class="color-danger-light zmdi zmdi-pin mr-1"></i>  
                    4,4/5  CENTRAL@CentralWorld ชั้น 14 ห้องเลขที่ 1403 ถนนราชดำริ ปทุมวัน กรุงเทพ 10330
                    <br>             
                    <i class="color-info-light zmdi zmdi-email mr-1"></i>
                    <a href="mailto:info@newcambridge.com">info@newcambridge.com</a>              
                    <i class="color-royal-light zmdi zmdi-phone mr-1"></i><a href="tel:+026131177">02 613 1177</a>
                </p>
                </address>
                <p>
                    <div class="ms-slidebar-social"> 
                    
                        <a href="https://www.facebook.com/NewCambridgeInstitute/" class="btn-circle btn-circle-raised btn-facebook">
                            <i class="zmdi zmdi-facebook"></i> 
                            <div class="ripple-container"></div>
                        </a> 

                        <a href="https://twitter.com/NewCambridgeTH" class="btn-circle btn-circle-raised btn-twitter"> 
                            <i class="zmdi zmdi-twitter"></i> 
                            <div class="ripple-container"></div>
                        </a> 

                        <a href="https://www.newcambridge.com/line/?p=landing_pantip" target="_blank" class="btn-circle "> 
                            <img src="public/assets/img/logo/icon_line.png" alt="line worldeducationlinks">
                            <div class="ripple-container"></div>
                        </a>   
                    </div>
                </p>
            </div>
        </footer>
    </div>
    
    <script src="{{ asset('public/assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/respond.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/assets/js/jquery.ui.draggable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/assets/js/jquery.alerts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/assets/js/plugins.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/coming.js') }}"></script>
    @yield('js')
</body>
</html>