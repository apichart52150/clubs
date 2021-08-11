<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Profile;
use App\ClubRegister;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth:student');
        $this->middleware('check_condition');
    }

    public function index() {

        $profile = Profile::getProfile();
        $myclubs = ClubRegister::myClub(auth('student')->user()->std_id);

        $myclubs = $myclubs->map(function ($item, $key) {
            $end_date = date('d M', strtotime($item->end_date));
            $start_time = date('H.i', strtotime($item->start_date));
            $end_time = date('H.i A', strtotime($item->end_date));
            return $item = array(
                'topicClub' => 'Topic : '.$item->topicClub,
                'teacher' => $item->teacher,
                'title_type' => $item->title_type,
                'date_show' => $end_date.' ('.$start_time.' - '.$end_time.')'
            );
        });

        // dd($profile->nccode);

        $mocktestData = DB::table('mocktest_allscore')
        ->select('*')
        ->where('std_id','=', auth('student')->user()->std_id)
        ->first();

        if(empty($mocktestData)){
            $dataScore = array(
                'status' => 0,
                'listening_score' => "0",
                'reading_score' => "0",
                'writing_score_1' => "0",
                'writing_score_2' => "0",
                'writing_score_3' => "0",
                'overall_writing_score' => "0",
                'speaking_score' => "0",
                'overall_band' => "0",
                'note' => "0"
            );
        }else{
            $dataScore = array(
                'status' => 1,
                'listening_score' => $mocktestData->listening_score,
                'reading_score' => $mocktestData->reading_score,
                'writing_score_1' => $mocktestData->writing_score_1,
                'writing_score_2' => $mocktestData->writing_score_2,
                'writing_score_3' => $mocktestData->writing_score_3,
                'overall_writing_score' => $mocktestData->overall_writing_score,
                'speaking_score' => $mocktestData->speaking_score,
                'overall_band' => $mocktestData->overall_band,
                'note' => $mocktestData->note
            );
        }

        // dd($dataScore);

        return view('profile', compact('profile', 'myclubs', 'dataScore'));
    }
}
