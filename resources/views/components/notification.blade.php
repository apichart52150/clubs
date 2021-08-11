@if(isset($responses)) 
    @php 
        if(($responses['status'] == 'success')) {
            $icon = "<i class='fas fa-check-circle fa-6x color-success mb-3'></i>";
            $color = 'success';
            $text = $responses['msg'];
        } else {
            $icon = "<i class='fas fa-times-circle fa-6x color-danger mb-3'></i>";
            $color = 'danger';
            $text = $responses['msg'];
        }
    @endphp

    <div class="modal" id="notificationModal" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-md animated zoomIn animated-3x" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    {!! $icon !!}
                    <p style="font-size: 18px;">
                    {!! $text !!}
                    </p>
                    <a href="{{ url('profile') }}" id="check-clubs"><i class="fas fa-list-alt"></i> Check clubs</a>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button type="button" class="btn btn-{{ $color }} btn-raised" data-dismiss="modal" id="accept">OK</button>
                </div>
            </div>
        </div>
    </div>
@else 
    @if(auth('student')->user()->coursetype !== 'online')
    <div class="modal" id="notificationModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md animated zoomIn animated-3x" role="document">
            <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
                <h3 class="modal-title" style="padding: 10px;"><i class="fa fa-bullhorn"></i> Announcement</h3>
            </div>
            <div class="modal-body">
                <p>
                <i class="fa fa-bookmark"></i> ตั้งแต่วันที่ 1 กุมภาพันธ์ 2564 เป็นต้นไป การเรียน Club และ Bonus Tutorial จะปรับรูปแบบเป็นการเรียนสดที่สถาบันฯตามปกติ
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn-raised" data-dismiss="modal">OK</button>
            </div>
            </div>
        </div>
    </div>
    @endif
@endif

