$(document).ready(function(){$("#ms-countdown").countdown("2017/04/30",function(l){$(this).html(l.strftime('<ul class="coming-date coming-date-black"> <li class="colon"> </li><li> 3 <span>ชั่วโมง</span></li><li class="colon">:</li><li>%M <span>นาที</span></li><li class="colon">:</li><li>%S <span>วินาที</span></li></ul>'))})});