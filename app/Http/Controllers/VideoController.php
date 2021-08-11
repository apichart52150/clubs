<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Model\DataInsert;

class VideoController extends Controller
{
    public function __construct() {
        $this->middleware('auth:student');
        $this->middleware('check_condition');
    }

    public function playback() {

        $class = DB::table('class_student')
        ->select('nccode')
        ->where('std_id', '=', auth('student')->user()->std_id)
        ->get();

        $firstStringCharacter = substr($class[0]->nccode, 0, 7);

        $video = DB::table('playback')
        ->select('*')
        ->where('class_code','=', $firstStringCharacter)
        ->get();


        $class_date = DB::table('class')
        ->select('startdate','lastdate')
        ->where('nccode', '=',  $firstStringCharacter)
        ->first();

        if(count($video) == 0){
            $name = '0';
            $date = '0';
            $check = 'null';
        }else{
            $name = $video[0]->class_code." / ".$video[0]->class_name;
            $date = "Start Date: ".date('d/m/Y', strtotime($class_date->startdate))." - ".date('d/m/Y', strtotime($class_date->lastdate));
            $check = 'have';
        }

        return view('playback',['video'=>$video],compact('name','date','check'));
    }

    public function viewClass() {
        $class = DB::table('class')
        ->select('*')
        ->get();

        return view('view_class', compact('class'));
    }

    public function video($class_id){

        $video = DB::table('playback')
        ->select('*')
        ->where('class_id' ,'=',$class_id)
        ->first();

        return view('playback_view', compact('video'));
    }

    public function viewVideo($nccode) {

        $class = DB::table('class')
        ->select('courseid','th_name')
        ->where('nccode', '=', $nccode)
        ->get();

        $course = DB::table('course')
        ->select('coursename')
        ->where('courseid', '=', $class[0]->courseid)
        ->get();

        $firstStringCharacter = substr($nccode, 0, 7);

        $video = DB::table('playback')
        ->select('*')
        ->where('class_code', '=', $firstStringCharacter)
        ->get();

        $data = array(
            'course' => $course[0]->coursename,
            'teacher' => $class[0]->th_name,
        );

        return view('view_video', compact('video','nccode','data'));
    }

    public function addVideo(Request $request) {

        $data = $request->input();
        $insert_video = new DataInsert;

        $insert_video->class_name = $data['video_name'];
        $insert_video->class_link = $data['video_link'];
        $insert_video->class_teacher = $data['video_teacher'];
        $insert_video->class_date = $data['video_date'];
        $insert_video->class_code = $data['nccode'];
        $insert_video->save();

        session()->flash('add','<div class="alert alert-success" role="alert">
        <i class="fas fa-check-circle mr-2"></i><strong>Add Class success</strong></div>'); 

        return redirect('class/'.$data['nccode'])->with('status',"Insert successfully");
    }

    public function editVideo(Request $request) {

        $id = $request->input('id');
        $class_name = $request->input('video_name');
        $class_link = $request->input('video_link');
        $class_teacher = $request->input('video_teacher');
        $class_date = $request->input('video_date');
        $class_code = $request->input('nccode');

        DB::update('update playback set class_name= ?, class_link = ?, class_teacher = ?, class_date = ?, class_code = ? where class_id = ?',[$class_name,$class_link,$class_teacher,$class_date,$class_code,$id]);

        session()->flash('update','<div class="alert alert-success" role="alert">
        <i class="fas fa-check-circle mr-2"></i><strong>Update success</strong></div>'); 

        return redirect('class/'.$request->input('nccode'))->with('status',"Edit successfully");
    }

    public function destroy($id) {
        DB::delete('delete from playback where class_id = ?',[$id]);
        session()->flash('delete','<div class="alert alert-danger" role="alert">
        <i class="fas fa-check-circle mr-2"></i><strong>Delete success</strong></div>'); 
        return redirect()->back();
    }
}
