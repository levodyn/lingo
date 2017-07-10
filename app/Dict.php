<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dict extends Model
{
    //Table name
	protected $table = 'dicts';
	//Primary key
	public $primaryKey = 'id';
	//Timestamps
	public $timestamps = true;
}
