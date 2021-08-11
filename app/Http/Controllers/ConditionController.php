<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class ConditionController extends Controller
{
    public function __construct() {
        $this->middleware('auth:student');
    }

    public function index() {

        if(Session::has('condition')) {
            return redirect('/home');
        } else {
            return view('condition');
        }
        
    }

    public function condition_submit(Request $request) {

        if($request->condition) {

            Session::put('condition', $request->condition);

            return redirect('/home');

        } else {
            return redirect('/condition');
        }

    }
}
