<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DataInsert extends Model
{
    protected $table = 'playback';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable = [
		'class_id','class_name','class_link','class_teacher','class_code','class_date',
	];
}
