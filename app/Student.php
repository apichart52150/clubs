<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $guard = "student";
    protected $table = "student";
    protected $primaryKey = "std_id";
    protected $rememberTokenName = false;
}
