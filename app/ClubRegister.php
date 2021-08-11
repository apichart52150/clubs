<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;
use DateTime;
use Carbon\Carbon;
use App\CarbonImmutable;

class ClubRegister extends Model

{
    public static function getClubRoom() {
        
        $clubs = DB::table('club_room')
            ->select(
                'club_type.id as type_id', 
                'club_type.title_type as type_header',
                'club_subtitle.id as subtitle_id',
                'club_subtitle.title as subtitle_header',
                'club_room.id as room_id',
                DB::raw('IF(club_room.type IS NULL, "live", club_room.type) as room_category'),
                'club_room.amount as amount',
                'club_room.status as room_type_header',
                'club_room.teacher',
                'club_room.topicClub',
                DB::raw('CONCAT(DATE_FORMAT(club_room.end_date, "%d %b"), DATE_FORMAT(club_room.start_date, " (%I.%i-"), DATE_FORMAT(club_room.end_date, "%I.%i %p)")) as date_show'),
                'club_room.start_date',
                'club_room.end_date',
                'club_room.start_post_date',
                'club_room.end_post_date',
                'club_register.studentInClass'
            )
            ->join('club_subtitle', 'club_subtitle.id', '=', 'club_room.subtitle_id')
            ->join('club_type', 'club_type.id', '=', 'club_subtitle.type_id')
            ->leftjoin(DB::raw('(SELECT COUNT(std_id) as studentInClass, room_id FROM club_register GROUP BY room_id) as club_register'), function($join) {
                $join->on('club_room.id', '=', 'club_register.room_id');
            })
            ->orderBy('club_type.order', 'asc')
            ->orderBy('club_room.start_date', 'asc')
            ->orderBy('room_id', 'desc')
            ->get();

        return $clubs;
    }

    public static function studentInClub($room_id = '') {

        $amount = DB::table('club_register')
            ->select(DB::raw('COUNT(room_id) as std_in_class'), 'room_id')
            ->groupBy('room_id')
            ->when($room_id, function ($query) use ($room_id) {
                return $query->where('room_id', $room_id);
            })
            ->get();
        
        return $amount;
    }

    public static function myClub($std_id) {

        $my_clubs = DB::table('club_register')
                ->select('club_room.topicClub', 'club_room.teacher', 'club_room.start_date', 'club_room.end_date','club_type.title_type')
                ->leftjoin('club_room', 'club_room.id', '=', 'club_register.room_id')
                ->leftjoin('club_subtitle', 'club_subtitle.id', '=', 'club_room.subtitle_id')
                ->leftjoin('club_type', 'club_type.id', '=', 'club_subtitle.type_id')
                ->where('club_register.std_id', $std_id)
                ->get();

        return $my_clubs;
    }

    public static function register($room_id, $std_profile) {

        /* 
            Club room status 
            0 = Normal Club
            1 = Bonus S1
            2 = Cancel Class
            3 = Bonus S2
        */
        
        // Get Club Room
        $club_room = DB::table('club_room')
                ->select('club_room.*','club_type.title_type as type','club_subtitle.title as title')
                ->join('club_subtitle', 'club_subtitle.id', '=', 'club_room.subtitle_id') 
                ->join('club_type', 'club_type.id', '=', 'club_subtitle.type_id') 
                ->where('club_room.id', $room_id)
                ->first();
        
        // Get All Student in club
        $students_in_club = DB::table('club_register') 
                ->where('room_id', $room_id)
                ->count();

        // Get student exists in Club
        $exists_club = DB::table('club_register')
                ->where('room_id', $room_id)
                ->where('std_id', $std_profile->std_id)
                ->count();

        $dates = DB::table('club_register')
            ->select('club_room.*')
            ->join('club_room', 'club_room.id', '=', 'club_register.room_id')
            ->where('club_room.status', '0')
            ->where('club_register.std_id', $std_profile->std_id)
            ->get();

        // Get student exists in Bonus S.1
        $exists_bonus_s1 = DB::table('club_register')
                ->join('club_room', 'club_room.id', '=', 'club_register.room_id')
                ->where('club_register.std_id', $std_profile->std_id)
                ->where('club_room.status', '1')
                ->count();
           
        // Get student exists in Bonus S.2
        $exists_bonus_s2 = DB::table('club_register')
        ->join('club_room', 'club_room.id', '=', 'club_register.room_id')
        ->where('club_register.std_id', $std_profile->std_id)
        ->where('club_room.status', '3')
        ->count();

        $responses = [];

        $nextMonday = date('Y-m-d', strtotime("next monday"));
        $current_endDate = date('Y-m-d', strtotime($club_room->end_date));
        $sameTime = false;

        // Check club start same time
        foreach($dates as $date) {
            if($date->start_date == $club_room->start_date && $date->id !== $club_room->id) {
                $sameTime = true;
            } 
        }
     
        // Check student in clubs less than club amount
        if ($students_in_club < $club_room->amount) {
            
            if ($club_room->status == '0') {

                if ($sameTime) {
                    $responses = ['status' => 'failed', 'msg' => 'ขออภัยไม่สามารถลง Club ภายในช่วงเวลาเดียวกันได้'];
                } else if (($std_profile->std_point > 0) && ($exists_club == 0)) {

                    DB::beginTransaction();

                    try {

                        DB::table('club_register')
                        ->insert([
                            'std_id' => $std_profile->std_id,
                            'room_id' => $room_id
                        ]);

                        $contentLog = $club_room->type.' '.$club_room->teacher.' '.date('j F, Y h:i:s', strtotime($club_room->start_date)).' Complete';

                        DB::table('log')
                        ->insert([
                            'room_id' => $room_id,
                            'std_id' => $std_profile->std_id,
                            'content' => $contentLog,
                            'tab' => 'Registered',
                            'score' => '-1 Point'
                        ]);

                        DB::table('student')
                        ->where('std_id', $std_profile->std_id)
                        ->decrement('std_point');

                        DB::commit();

                        $responses = ['status' => 'success', 'msg' => 'Register Success.'];

                    } catch(\Exception $e) {
                        DB::rollback();
                    }
                    
                } else {
                    $responses = ['status' => 'failed', 'msg' => 'ขออภัย Point ไม่เพียงพอสำหรับลง Club หรือ คุณมีรายชื่ออยู่ใน Club เรียบร้อยแล้ว'];
                }

     
            } else if($club_room->status == '1') {

                if($std_profile->std_bonus > 0) {
                    if ($current_endDate < $nextMonday) {
                        $isRegister = $exists_bonus_s1 < 1 ? true : false;
                    } else {
                        $isRegister = $exists_bonus_s1 < 1 ? true : false;
                    }
                } else {
                    $isRegister = false;
                }

                if($isRegister) {

                    DB::beginTransaction();

                    try {
                        DB::table('club_register')
                        ->insert([
                            'std_id' => $std_profile->std_id,
                            'room_id' => $room_id
                        ]);

                        $contentLog = $club_room->type.' '.$club_room->teacher.' '.date('j F, Y h:i:s', strtotime($club_room->start_date)).' Complete';

                        DB::table('log')
                        ->insert([
                            'room_id' => $room_id,
                            'std_id' => $std_profile->std_id,
                            'content' => $contentLog,
                            'tab' => 'Registered',
                            'score' => '-1 Bonus'
                        ]);

                        DB::table('student')
                        ->where('std_id', $std_profile->std_id)
                        ->decrement('std_bonus');

                        DB::commit();

                        $responses = ['status' => 'success', 'msg' => 'Register Success.'];
                    } catch (\Exception $e) {
                        DB::rollback();
                    }

                } else {
                    $responses = ['status' => 'failed', 'msg' => 'คุณมี point ไม่เพียงพอสำหรับจอง Bonus Tutorial หรือ คุณมีรายชื่ออยู่ใน Bonus Tutorial เรียบร้อยแล้ว <br>
                    หมายเหตุ : Bonus Tutorial สามารถจองได้สัปดาห์ละ 1 ครั้งเท่านั้น'];
                }


            } else if($club_room->status == '3') {

                if($std_profile->std_bonus > 0) {
                    if ($current_endDate < $nextMonday) {
                        $isRegister = $exists_bonus_s2 < 1 ? true : false;
                    } else {
                        $isRegister = $exists_bonus_s2 < 1 ? true : false;
                    }
                } else {
                    $isRegister = false;
                }
                
                if($isRegister) {
                    DB::beginTransaction();

                    try {
                        DB::table('club_register')
                        ->insert([
                            'std_id' => $std_profile->std_id,
                            'room_id' => $room_id
                        ]);

                        $contentLog = $club_room->type.' '.$club_room->teacher.' '.date('j F, Y h:i:s', strtotime($club_room->start_date)).' Complete';

                        DB::table('log')
                        ->insert([
                            'room_id' => $room_id,
                            'std_id' => $std_profile->std_id,
                            'content' => $contentLog,
                            'tab' => 'Registered',
                            'score' => '-1 Bonus'
                        ]);

                        DB::table('student')
                        ->where('std_id', $std_profile->std_id)
                        ->decrement('std_bonus');

                        DB::commit();

                        $responses = ['status' => 'success', 'msg' => 'Register Success.'];
                    } catch (\Exception $e) {
                        DB::rollback();
                    }

                } else {
                    $responses = ['status' => 'failed', 'msg' => 'คุณมี point ไม่เพียงพอสำหรับจอง Bonus Tutorial หรือ คุณมีรายชื่ออยู่ใน Bonus Tutorial เรียบร้อยแล้ว <br>
                    หมายเหตุ : Bonus Tutorial สามารถจองได้สัปดาห์ละ 1 ครั้งเท่านั้น'];
                }

            }
            
        } else {
            $responses = ['status' => 'failed', 'msg' => 'This Club is Full.'];
        }

        return $responses;
    }
}
