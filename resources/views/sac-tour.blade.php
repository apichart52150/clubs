@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.4/plyr.css" />
    <style>
        #player {
            margin-bottom: 50px;
        }

        .plyr__controls__item {
            display: flex !important;
        }
    </style>
@stop

@section('content')
<div class="col-md-12">
    <div class="plyr__video-embed" id="player">
    @if (auth('student')->user()->coursetype === 'online')
        <iframe
        src="https://www.youtube.com/watch?v=rRhiFJE3WW8?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
        allowfullscreen
        allowtransparency
        allow="autoplay"
        ></iframe>
    @elseif (auth('student')->user()->coursetype === 'live')
        <iframe
        src="https://youtu.be/WjqS2dXYOnI?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
        allowfullscreen
        allowtransparency
        allow="autoplay"
        ></iframe>
    @endif
    </div>
</div>
@endsection

@section('js')
    <script src="https://cdn.plyr.io/3.6.4/plyr.js"></script>
    <script>
        const player = new Plyr('#player', {
            controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'airplay', 'fullscreen'],
            keyboard: {
                global: true
            }
        });
    </script>
@stop

