<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;

class HistoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth:student');
        $this->middleware('check_condition');
    }

    public function index() {

        if(auth('student')->user()->coursetype == 'online') {
            $tabs = ['Registration', 'Status', 'Cancellation'];
        } else {
            $tabs = ['Registration', 'Status', 'Cancellation', 'SAC Paper', 'Borrowbook'];
        }

        $historys = History::getHistory();

        $historys = $historys->groupBy(function ($item, $key) {
            return $item->tab_status;
        });

        $data = [];

        foreach($tabs as $tab) {
            if(isset($historys[$tab])) {
                foreach($historys[$tab] as $value) {
                    $data[$tab][] = $value;
                }
            } else {
                $data[$tab] = [];
            }
        }

        return view('history', compact('data', 'tabs'));
    }
}
 