@extends('layouts.main')

@section('css')
<style>
    @media(max-width: 768px) {
        .ms-header {
            display: block;
            text-align: center;
            min-height: auto !important;
        }

        .ms-header .ms-title img {
            width: 110px;
        }
    }
</style>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-warning">
        @if(auth('student')->user()->coursetype !== 'online')
        <!-- Condition for Live -->
        <div class="card-header">
            <h3 class="card-title">
            เงื่อนไขการจอง Club และ Bonus Tutorial
            </h3>
        </div>
        <div class="card-body card-content">
            <ol>
                <li>เมื่อกดจอง Club หรือ Bonus Tutorial แล้ว ระบบจะทำการหัก 1 point ทันที</li>
                <ul>
                    <li>กรุณาตรวจสอบรายละเอียดวัน เวลา ก่อนการจอง Club และ Bonus Tutorial ทุกครั้ง</li>
                    <li>Point ที่ใช้จอง Club หรือ Bonus Tutorial ไปแล้ว ไม่สามารถขอคืนได้ทุกกรณี</li>
                </ul>
                <li>เมื่อจอง Club หรือ Bonus Tutorial แล้ว ไม่สามารถยกเลิกได้ทุกกรณี</li>
                <ul>
                    <li>
                        หากไม่มาเข้า Club หรือ Bonus Tutorial ทุกกรณี ระบบจะหัก point เพิ่มอีก 1 point (รวมถูกหัก 2 points หากไม่มาเข้า Club หรือ Bonus Tutorial)
                    </li>
                    <li>
                        กรณีป่วยกระทันหันจะต้องมี “ใบรับรองแพทย์” มาแสดง เจ้าหน้าที่จะคืน point ที่ถูกหักเพิ่มให้ 1 point (ไม่คืน point ที่ใช้จอง รวมถูกหัก 1 point)
                    </li>
                    <li>
                        กรณีมาสายเกิน 5 นาที เจ้าหน้าที่จะไม่อนุญาตให้เข้า Club หรือ Bonus Tutorial (ไม่คืน point ที่ใช้จอง รวมถูกหัก 1 point)
                    </li>
                </ul>
                <li>วันหมดอายุของ Club Card ไม่สามารถขยายระยะเวลาได้ทุกกรณี</li>
                <li>ตาราง Club, Bonus Tutorial และอาจารย์ผู้สอน อาจมีการเปลี่ยนแปลงตามความเหมาะสม</li>
            </ol>
            <p class="font-weight-bold">Conditions of reserving Clubs and Bonus Tutorials</p>
            <ol>
                <li>When you’ve already reserved a Club or a Bonus Tutorial, your point will be deducted immediately.</li>
                <ul>
                    <li>Please accurately check the detail of date and time before reserving a Club or a Bonus Tutorial.</li>
                    <li>After you submit your reservation of Club or a Bonus Tutorial, your point can not be refunded at all.</li>
                </ul>
                <li>After you submit your reservation Club or a Bonus Tutorial, you can not cancel in any circumstance.</li>
                <ul>
                    <li>
                        If you do not come to the Club or the Bonus Tutorial in all cases, the system will deduct one more point. (2 points deducted in total)
                    </li>
                    <li>
                        A sudden illness requires a "Medical certificate" shown to the institute, the CS officer will return 1 point that you’re deducted.
                    </li>
                    <li>
                        If you are late by more than 5 minutes, you will not be allowed to attend the Club or the Bonus Tutorial. (1 point will be deducted)
                    </li>
                </ul>
                <li>The Club card expiration cannot be extended in any circumstance.</li>
                <li>The Club or the Bonus Tutorial Schedule and teacher may be changed as appropriate.</li>
            </ol>
            <div class="button-group">
                <form action="{{ route('condition.submit') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="condition" value="true">
                    <button type="submit" class="btn btn-raised btn-success">Agree</button>
                </form>

                <a href="{{ url('logout') }}" class="btn btn-raised btn-danger">Disagree</a>
            </div>
        </div>
        @else
        <!-- Condition for Online -->
        <div class="card-header">
            <h3 class="card-title">
            เงื่อนไขการจอง Bonus Tutorial
            </h3>
        </div>
        <div class="card-body card-content">
            <ol>
                <li>เมื่อกดจอง Bonus Tutorial แล้ว ระบบจะทำการหัก 1 point ทันที</li>
                <ul>
                    <li>กรุณาตรวจสอบรายละเอียดวัน เวลา ก่อนการจอง Bonus Tutorial ทุกครั้ง</li>
                    <li>Point ที่ใช้จอง Bonus Tutorial ไปแล้ว ไม่สามารถขอคืนได้ทุกกรณี</li>
                </ul>
                <li>เมื่อจอง Bonus Tutorial แล้ว ไม่สามารถยกเลิกได้ทุกกรณี</li>
                <ul>
                    <li>
                        หากไม่มาเข้า Bonus Tutorial ทุกกรณี ระบบจะหัก point เพิ่มอีก 1 point (รวมถูกหัก 2 points หากไม่มาเข้า Bonus Tutorial)
                    </li>
                    <li>
                        กรณีป่วยกระทันหันจะต้องมี “ใบรับรองแพทย์” มาแสดง เจ้าหน้าที่จะคืน point ที่ถูกหักเพิ่มให้ 1 point (ไม่คืน point ที่ใช้จอง รวมถูกหัก 1 point)
                    </li>
                    <li>
                        กรณีมาสายเกิน 5 นาที เจ้าหน้าที่จะไม่อนุญาตให้เข้า Bonus Tutorial (ไม่คืน point ที่ใช้จอง รวมถูกหัก 1 point)
                    </li>
                </ul>
                <li>ตาราง Bonus Tutorial และอาจารย์ผู้สอน อาจมีการเปลี่ยนแปลงตามความเหมาะสม</li>
            </ol>
            <p class="font-weight-bold">Conditions of reserving Bonus Tutorials</p>
            <ol>
                <li>When you’ve already reserved a Bonus Tutorial, your point will be deducted immediately.</li>
                <ul>
                    <li>Please accurately check the detail of date and time before reserving a Bonus Tutorial.</li>
                    <li>After you submit your reservation of Bonus Tutorial, your point can not be refunded at all.</li>
                </ul>
                <li>After you submit your reservation Bonus Tutorial, you can not cancel in any circumstance.</li>
                <ul>
                    <li>
                        If you do not come to the Bonus Tutorial in all cases, the system will deduct one more point. (2 points deducted in total)
                    </li>
                    <li>
                        A sudden illness requires a "Medical certificate" shown to the institute, then CS officer will return 1 point that you’re deducted.
                    </li>
                    <li>
                        If you are late by more than 5 minutes, you will not be allowed to attend the Bonus Tutorial. (1 point will be deducted)
                    </li>
                </ul>
                <li>The Bonus Tutorial Schedule and teacher may be changed as appropriate.</li>
            </ol>
            <div class="button-group">
                <form action="{{ route('condition.submit') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="condition" value="true">
                    <button type="submit" class="btn btn-raised btn-success">Agree</button>
                </form>

                <a href="{{ url('logout') }}" class="btn btn-raised btn-danger">Disagree</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection