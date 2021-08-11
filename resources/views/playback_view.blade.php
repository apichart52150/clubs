<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.3/plyr.css" />
    <link rel="stylesheet" href="{{ asset('public/assets/kanit-master/css/fonts.css') }}" />
    <style>
        iframe {
            width: 100% !important;
        }
        body{
            background-color: #F5F5F5;
        }
        .container{
            width:70%;
            margin:0 auto;
        }
        @media(max-width:700px){
            .container{
                width:100%;
            }  
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark sticky-top" style="border-bottom: 1px solid #fff;">
        <div class="container-fluid">
            <h1 class="navbar-brand">( {{$video->class_name}} ) | {{$video->class_teacher}} | {{$video->class_code}}</h1>
        </div>
    </nav>

 
    <div class="container">
        <div class="plyr__video-embed" id="player">
            <iframe
                src="{{$video->class_link}}"
                allowfullscreen
                allowtransparency
                allow="autoplay"
            >
            </iframe>
        </div>
    </div>

    <script src="https://cdn.plyr.io/3.6.3/plyr.js"></script>
    <script>
        const player = new Plyr('#player', {
            invertTime: true,
            controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'settings', 'fullscreen'],
            keyboard: {
                global: true
            },
            tooltips: { controls: true, seek: true },
            youtube: { noCookie: false, rel: 0, showinfo: 0, iv_load_policy: 3, modestbranding: 1 }
        });

        window.oncontextmenu = function(e) {
        	e.preventDefault()
        }
    </script>
    
</body>
</html>
