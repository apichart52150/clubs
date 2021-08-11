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
            $dataScore = 0;
        }else{
            $dataScore = 1;
        }

        return view('profile', compact('profile', 'myclubs', 'mocktestData', 'dataScore'));
    }
}
