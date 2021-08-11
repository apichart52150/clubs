@extends('layouts.main')

@section('content')
    <div class="col-md-12">
        @if($check == 'have')
            <h2 class="text-center">
                <b>{{$name}}</b>
            </h2>
            <h4 class="text-center">
                {{$date}}
            </h4>
        
            <div class="row d-flex mt-3">
                @foreach ($video as $user)
                    <div class="col-md-3 col-md-4 col-sm-12">
                        <a href="{{url($user->class_id)}}" target="blank_">
                        <div class="card p-5 bg-primary">
                            <div class="card-block text-center">
                                <i class="fas fa-video" style="font-size: 4em;"></i>  
                                <h1>
                                @php
                                $newDateFormat2 = date('d/m/Y', strtotime($user->class_date));
                                @endphp

                                {{$newDateFormat2}}
                                </h1>
                            </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
        <h1 class="text-center">ระบบกำลังดำเนิการประมวลผลวีดิโอ กรุณารอสักครู่.. <br> หรือติดต่อ 02 613 1177</h1>
        @endif
    </div>
@endsection