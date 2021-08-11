@extends('layouts.main')

@section('content')
<div class="col-md-12 mx-auto">
    <div class="card card-primary wow zoomInUp animation-delay-7">
        <div class="ms-hero-bg-primary ms-hero-img-city">
            <img src="{{ asset('public/assets/img/businessman.png') }}" class="img-avatar-circle">
        </div>
        <div class="card-block pt-6 text-center">
            <h2 class="color-primary">{{ auth('student')->user()->std_name }}</h2>

            <table class="table table-border table-sm table-profile">
                <tr>
                    <th>
                        <h4>
                            <i class="fas fa-file-alt color-success"></i> Course
                        </h4>
                    </th>
                    <td>{{ $profile->nccode }} ({{ $profile->coursename }})</td>
                </tr>
                <tr>
                    <th>
                        <h4>
                        <i class="fas fa-calendar-times color-danger"></i>
                        Expire Date
                        </h4>
                    </th>
                    <td>{{ date('d/M/Y', strtotime($profile->class_expire)) }}</td>
                </tr>
    
                @component('components.info', ['profile' => $profile])    
                @endcomponent
            </table>

            <button type="button" class="btn btn-info btn-raised" data-toggle="modal" data-target="#info">
                My Club
                <div class="ripple-container"></div>
            </button>
            <a href="{{ url('logout') }}" class="btn btn-danger btn-raised">
                Log Out
                <div class="ripple-container"></div>
            </a>
        </div>
    </div>
</div>

<!-- Modal info -->
<div class="modal modal-warning" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel6">
    <div class="modal-dialog animated zoomIn animated-3x" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
                <h3 class="modal-title">MY CLUB</h3>
            </div>
            <div class="modal-body text-center">
                @forelse($myclubs as $myclub)
                    @if(strpos($myclub['title_type'], 'Bonus') !== false)
                    <button type="button" class="btn btn-warning btn-raised" style="white-space: normal;"> 
                        {{ $myclub['title_type'] }} ( {{ $myclub['teacher'] }} )<br>
                        {{ $myclub['date_show'] }}
                        <div class="ripple-container"></div>
                    </button>
                    @else
                    <button type="button" class="btn btn-primary btn-raised" style="white-space: normal;"> 
                        {{ $myclub['title_type'] }} ( {{ $myclub['teacher'] }} )<br>
                        {{ $myclub['topicClub'] }} <br>
                        {{ $myclub['date_show'] }}
                        <div class="ripple-container"></div>
                    </button>
                    @endif
                @empty
                    <p>ไม่มีรายการ คุณสามารถจองคลับได้ที่นี่ <a href="{{ url('/home') }}">Club Registration</a></p>
                @endforelse
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    let prevUrl = "{{ str_replace(url('/'), '', url()->previous()) }}";

    const prevHome = localStorage.getItem('prev_home');
    
    if(prevHome) {
        $('#info').modal('show')
        localStorage.removeItem('prev_home')
    }

</script>
@endsection
