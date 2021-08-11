<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\UserAlert;
use App\ClubRegister;

class ClubRegisterController extends Controller
{
    public function __construct() {
        $this->middleware('auth:student');
        $this->middleware('check_condition');
    }

    public function register_club(Request $request) {

        $rooms = ClubRegister::register($request->room_id, auth('student')->user());

        session()->flash('responses', $rooms);

        return back();
    }

    public function accept_cancel() {

        $status = UserAlert::updateStatus();

        if($status['code'] == 200) {
            return redirect('/home');
        } else {
            return 'Update Status Error '.$status['code']; die;
        }

    }
}
