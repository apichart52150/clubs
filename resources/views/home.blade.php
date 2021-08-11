@extends('layouts.main')

@section('css')
<style>
    .class-expire {
        display: flex;
        justify-content: center;
    }

    button {
        white-space: normal !important;
    }

    @media(max-width: 500px) {
        .panel-body {
            text-align: center !important;
        }
        .panel-body p {
            text-align: left;
        }

        .panel-body button {
            width: 100%;
            padding: 5px 0;
        }
    }
</style>
@stop

@section('content')
<div class="col-md-12">
    @if(\App\Profile::getProfile()->class_status == 'Expire') 
        <div class="row d-flex class-expire">
            <div class="col-md-6">
                <div class="card card-warning">
                    <div class="card-block text-center">
                        <span class="ms-icon ms-icon-circle ms-icon-xxlg mb-4 color-warning">
                            <i class="fa fa-bell"></i>
                        </span>
                        <h4 class="color-warning">Class ที่ลงทะเบียนหมดอายุ ไม่สามารถทำการจอง Clubs ได้</h4>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row d-flex">
            <div class="col-md-12">
                <a href="{{url('playback')}}">
                    <div class="card bg-success">
                        <div class="card-block text-center">
                            <i class="fas fa-play m-0 " style="font-size: 5em;"></i>  <span style="font-size: 5em;">Video Playback</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @if(!$isCancel)

            @if(session()->has('responses'))
                @component('components.notification', ['responses' => session()->get('responses')])
                @endcomponent
            @else
                @component('components.notification')
                @endcomponent
            @endif

            @component('components.club_room', ['data' => $data])
            @endcomponent
            
        @else
        <div class="row d-flex class-expire">
            <div class="col-md-6">
                <div class="card card-warning">
                    <div class="card-block text-center">
                        <span class="ms-icon ms-icon-circle ms-icon-xxlg mb-4 color-warning">
                            <i class="fa fa-bell"></i>
                        </span>
                        <h4 class="color-warning">ต้องขออภัยในความไม่สะดวก ทางเรามีเหตุจำเป็นต้อง Cancel Club หากท่านได้ลงทะเบียนเรียบร้อยแล้วระบบจะคืนแต้มที่หักไปและสามารถตรวจสอบ club ที่ถูกยกเลิกได้ที่เมนู History List</h4>
                        <form action="{{ route('cancel.submit') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="std_id" value="{{ auth('student')->user()->std_id }}">
                            <button type="submit" class="btn btn-warning btn-raised">Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endif
</div>
@endsection

@section('js')
<script>
    const checkClubs = document.getElementById('check-clubs');
    if(checkClubs !== null) {
        checkClubs.addEventListener('click', () => {
            localStorage.setItem('prev_home', true)
        }) 
    }
</script>
@stop