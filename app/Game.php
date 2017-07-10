<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
   //Table name
	protected $table = 'games';
	//Primary key
	public $primaryKey = 'id';
	//Timestamps
	public $timestamps = true;
	
	public function user(){
		return $this->belongsTo('App\User');
	}
}
