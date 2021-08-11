@extends('layouts.main')

@section('css')
    <style>
        @media(max-width: 500px) {
            .ms-navbar {
                margin-bottom: 0 !important;
            } 

            h2.faq-title {
                display: flex;
                flex-direction: column;
                font-size: 20px;
            }

            h2.faq-title img {
                width: 60px;
                margin: 0 auto;
            }
        }
    </style>
@endsection

@section('content')
<div class="col-md-12">
 
    <h2 class="faq-title"><img src="{{ asset('public/assets/img/faq.png') }}" alt=""> Frequently Asked Questions</h2>

    <div class="row faq">
        @if(auth('student')->user()->coursetype !== 'online')
        <!-- FAQs For Live -->
        <div class="card-block">
            <div class="col-md-6">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselecttable="true" class="m-b-20">
                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    1. เข้า Club และ Bonus Tutorial ได้ทั้งหมดกี่ครั้งต่อ 1 คอร์ส
                                </a>
                            </h4>
                        </div>

                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <ul>
                                    <li>Club เข้าได้ 9 ครั้ง (ครั้งละ 1 ชั่วโมง) แบ่งเป็น Speaking, Writing, Reading, Listening</li>
                                    <li>Bonus Tutorial เข้าได้ 3 ครั้ง (ครั้งละ 20 นาที) จำกัดการเข้า 1 ครั้งต่อสัปดาห์</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    2. จอง Club และ Bonus Tutorial ตอนไหน
                                </a>
                            </h4>
                        </div>

                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>การจอง Club และ Bonus Tutorial ต้องทำการจองล่วงหน้า 1 สัปดาห์ ทุกวันเสาร์ เวลา 13.15 น. เป็นต้นไป</p>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    3. ยกเลิก Club และ Bonus Tutorial ได้หรือไม่
                                </a>
                            </h4>
                        </div>

                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>ไม่สามารถยกเลิก Club และ Bonus Tutorial ได้ทุกกรณี ยกเว้นแจ้งยกเลิกกับเจ้าหน้าที่ Customer Service ด้านหน้าเคาน์เตอร์ภายในวันที่กดจองเท่านั้น</p>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    4. เข้า Club และ Bonus Tutorial ได้ถึงเมื่อไหร่
                                </a>
                            </h4>
                        </div>

                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">
                                <ul>
                                    <li>คลาสเรียนวันจันทร์-วันศุกร์ ต่ออายุเพิ่ม 30 วันทำการหลังจากจบคลาส</li>
                                    <li>คลาสเรียนวันเสาร์-อาทิตย์ ต่ออายุเพิ่ม 75 วันทำการหลังจากจบคลาส</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingFive">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                    5. หากต้องการเขียน iSAC Writing สามารถหาโจทย์ได้จากช่องทางใดบ้าง
                                </a>
                            </h4>
                        </div>

                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                            <div class="panel-body">
                                <ul>
                                    <li>ซื้อจากทางสถาบันกับเจ้าหน้าที่ด้านหน้าเคาน์เตอร์</li>
                                    <li>นักเรียนนำโจทย์มาเอง</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="panel-group" id="accordion2" role="tablist" aria-multiselecttable="true" class="m-b-20">

                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                    6. ส่ง iSAC Writing อย่างไร
                                </a>
                            </h4>
                        </div>

                        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                            <div class="panel-body">
                                <ul>
                                    <li>แบบ Paper ส่งกับเจ้าหน้าที่ Customer Service ด้านหน้าเคาน์เตอร์ โดยส่งพร้อม Student Card ทุกครั้ง</li>
                                    <li>
                                        แบบ Online ผ่าน Website ของทางสถาบัน
                                        <a href="https://www.newcambridgethailand.com/sacwriting/logincustom" target="_blank" style="word-break: break-word;">www.newcambridgethailand.com/sacwriting/logincustom</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingSeven">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                    7. ใช้เวลาตรวจ iSAC Writing กี่วัน
                                </a>
                            </h4>
                        </div>

                        <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                            <div class="panel-body">
                                <ul>
                                    <li>iSAC Writing ทั้งรูปแบบ paper และ online ใช้เวลาตรวจประมาณ 7-10 วัน</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingEight">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                                    8. iSAC Online คืออะไร
                                </a>
                            </h4>
                        </div>

                        <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                            <div class="panel-body">
                                <p>
                                    iSAC เป็นส่วนหนึ่งของ Self Access Centre ที่สถาบันนิวเคมบริดจ์ได้จัดทำขึ้นเพื่อให้ได้ผู้เรียนได้ฝึกฝนทักษะทางภาษาอังกฤษ โดยผู้เรียนสามารถฝึกฝนได้ด้วยตัวเองผ่านทาง Internet ไม่ว่าจะเป็นจากที่บ้าน ที่ทำงาน หรือมหาวิทยาลัย ซึ่งทำให้สะดวกสำหรับผู้เรียนที่จะสามารถฝึกฝนได้ทุกที่ทุกเวลา เพื่อให้เกิดประโยชน์สูงสุด โดยแบ่งเป็น
                                </p>
                                <ul>
                                    <li>iSAC Listening Online</li>
                                    <li>iSAC Writing Online</li>
                                    <li>iSAC Speaking Online</li>
                                    <li>iSAC Reading Online</li>
                                    <li>IELTS Topic Packs</li>
                                    <li>Strategies Packs</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingNine">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                                    9. มีค่าใช้จ่ายในการยืมหนังสือหรือไม่
                                </a>
                            </h4>
                        </div>

                        <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
                            <div class="panel-body">
                                <p>
                                    มีค่ามัดจำ 600 บาท (เงินสด) และจะได้รับเงินสดคืน เมื่อนำหนังสือมาคืน สามารถยืมหนังสือได้ 7 วัน กรณียืมหนังสือเกินกำหนด มีค่าปรับวันละ 100 บาทและห้ามขีดเขียนลงบนหนังสือ ฝ่าฝืนปรับ 600 บาท
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingTen">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                                    10. สามารถต่ออายุ Student Card ได้หรือไม่
                                </a>
                            </h4>
                        </div>

                        <div id="collapseTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTen">
                            <div class="panel-body">
                                <p>
                                    ไม่สามารถขยายระยะเวลาวันหมดอายุของ  Student Card ได้ทุกกรณี 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Accordion -->
            </div>
        </div>
        @else 
        <!-- FAQs for Online -->
        <div class="card-block">
            <div class="col-md-6">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselecttable="true" class="m-b-20">
                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    1. เข้า Bonus Tutorial ได้ทั้งหมดกี่ครั้งต่อ 1 คอร์ส
                                </a>
                            </h4>
                        </div>

                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <ul>
                                    <li>Bonus Tutorial เข้าได้ 3 ครั้ง (ครั้งละ 20 นาที) จำกัดการเข้า 1 ครั้งต่อสัปดาห์</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    2. จอง Bonus Tutorial ตอนไหน
                                </a>
                            </h4>
                        </div>

                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>การจอง Bonus Tutorial ต้องทำการจองล่วงหน้า 1 สัปดาห์ เปิดจองทุกวันเสาร์ เวลา 13.15 น. เป็นต้นไป</p>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    3. ยกเลิก Bonus Tutorial ได้หรือไม่
                                </a>
                            </h4>
                        </div>

                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>ไม่สามารถยกเลิก Bonus Tutorial ได้ทุกกรณี ยกเว้นแจ้งยกเลิกกับเจ้าหน้าที่ Customer Service ด้านหน้าเคาน์เตอร์ภายในวันที่กดจองเท่านั้น</p>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    4. เข้า Bonus Tutorial ได้ถึงเมื่อไหร่
                                </a>
                            </h4>
                        </div>

                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">
                                <ul>
                                    <li>คลาสเรียนวันจันทร์-วันศุกร์ ต่ออายุเพิ่ม 30 วันทำการหลังจากจบคลาส</li>
                                    <li>คลาสเรียนวันเสาร์-อาทิตย์ ต่ออายุเพิ่ม 75 วันทำการหลังจากจบคลาส</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="panel-group" id="accordion2" role="tablist" aria-multiselecttable="true" class="m-b-20">

                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                    5. ส่ง iSAC Writing อย่างไร
                                </a>
                            </h4>
                        </div>

                        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                            <div class="panel-body">
                                <ul>
                                    <li>
                                        Online ผ่าน Website ของทางสถาบัน
                                        <a href="https://www.newcambridgethailand.com/sacwriting/logincustom" target="_blank" style="word-break: break-word;">www.newcambridgethailand.com/sacwriting/logincustom</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingSeven">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                    6. ใช้เวลาตรวจ iSAC Writing กี่วัน
                                </a>
                            </h4>
                        </div>

                        <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                            <div class="panel-body">
                                <ul>
                                    <li>ใช้เวลาตรวจประมาณ 7-10 วัน</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingEight">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                                    7. iSAC Online คืออะไร
                                </a>
                            </h4>
                        </div>

                        <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                            <div class="panel-body">
                                <p>
                                    iSAC เป็นส่วนหนึ่งของ Self Access Centre ที่สถาบันนิวเคมบริดจ์ได้จัดทำขึ้นเพื่อให้ได้ผู้เรียนได้ฝึกฝนทักษะทางภาษาอังกฤษ โดยผู้เรียนสามารถฝึกฝนได้ด้วยตัวเองผ่านทาง Internet ไม่ว่าจะเป็นจากที่บ้าน ที่ทำงาน หรือมหาวิทยาลัย ซึ่งทำให้สะดวกสำหรับผู้เรียนที่จะสามารถฝึกฝนได้ทุกที่ทุกเวลา เพื่อให้เกิดประโยชน์สูงสุด โดยแบ่งเป็น
                                </p>
                                <ul>
                                    <li>iSAC Listening Online</li>
                                    <li>iSAC Writing Online</li>
                                    <li>iSAC Speaking Online</li>
                                    <li>iSAC Reading Online</li>
                                    <li>IELTS Topic Packs</li>
                                    <li>Strategies Packs</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End Accordion -->
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@section('js')
<script>
    $('#accordion, #accordion2').collapse()
</script>
@stop