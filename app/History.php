<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class History extends Model
{

    public static function getHistory() {

        $except_tab = ['SAC Online', 'iSAC Speaking'];

        $logs = DB::table('log')
            ->select('log.*', 
                DB::raw('
                (CASE WHEN log.tab = "Checking" THEN "Status" 
                WHEN log.tab IN ("Register", "Registered") THEN "Registration" 
                WHEN log.tab = "Cancel" THEN "Cancellation"
                ELSE log.tab END) AS tab_status'))
            ->where('log.std_id', auth('student')->user()->std_id)
            ->whereNotIn('log.tab', $except_tab)
            ->get();
        
        return $logs;
    }
}
