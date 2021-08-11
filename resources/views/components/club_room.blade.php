@php 
    if(empty(auth('student')->user()->coursetype)) {
        $course_type = 'live';
    } else {
        $course_type = auth('student')->user()->coursetype;
    }
@endphp

@forelse($data[$course_type] as $key => $subtitles)

    @php 
        if(strpos($key, 'Bonus') !== false) {
            $panelColor = 'warning';
            $contentModal = 'เมื่อทำการยืนยันการจอง Bonus Tutorial แล้ว ไม่สามารถยกเลิกได้ไม่ว่าในกรณีใดๆ ถ้าหากทำการจอง Bonus Tutorial แล้วไม่ได้เดินทางมาเข้าเรียนทางเราขออนุญาตตัดสิทธิเพิ่ม 1 Bonus กรุณาตรวจสอบความถูกต้องก่อนทำการยืนยันการจอง Bonus Tutorial ทุกครั้ง';
        } else {
            $panelColor = 'black';
            $contentModal = 'เมื่อทำการยืนยันการจอง Club แล้ว ไม่สามารถยกเลิกได้ไม่ว่าใกรณีใดๆ ถ้าหากทำการจอง Club แล้วไม่ได้เดินทางมาเข้าเรียนทางเราขออนุญาตตัดสิทธิเพิ่ม 1 Point กรุณาตรวจสอบความถูกต้องก่อนทำการยืนยันการจอง Club ทุกครั้ง';
        }
    @endphp

    <div class="panel panel-{{ $panelColor }}">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $key }}</h3>
        </div>
        <div class="panel-body">
            @foreach($subtitles as $key => $clubs)
                <p class="color-primary">{{ $key }}</p>

                @foreach($clubs as $club)

                    @if($club['room_state'] == 'Available') 

                        <button type="button" class="btn btn-success btn-raised" data-toggle="modal" data-target="#{{ $club['room_id'] }}">
                            {!! $club['topic'] !!}
                        </button>

                        <div class="modal" id="{{ $club['room_id'] }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-sm modal-centered animated zoomIn animated-3x" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: 0; padding: 10px 20px;">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <h4 class="modal-title">{{ $club['date_show'] }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>{{ $contentModal }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('register.submit') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="room_id" value="{{ $club['room_id'] }}"/>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-success">Confirm</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @elseif(in_array($club['room_state'], ['Cancel Class', 'Full']))
                        <button class="btn btn-danger btn-raised">
                            {!! $club['topic'] !!}
                        </button>
                    @elseif($club['room_state'] == 'Open Soon')
                        <button type="button" class="btn btn-default btn-raised" data-toggle="modal" data-target="#{{ $club['room_id'] }}">
                            {!! $club['topic'] !!}
                        </button>
                        <div class="modal" id="{{ $club['room_id'] }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-sm animated zoomIn animated-3x" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <h4 class="modal-title">{{ $club['teacher'] }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Club จะเริ่มเปิดให้จองได้ ในวันที่ {{ date(' d M, Y H:i A', strtotime($club['start_post_date'])) }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                @endforeach

            @endforeach
        </div>
    </div>
@empty
<h1>No Club created.</h1>
@endforelse

<p>*สถาบันนิวเคมบริดจ์ สงวนสิทธิ์ในการเปลี่ยนแปลงตาราง Club และ Bonus Tutorial ตามความเหมาะสม</p>