<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model {

	//
	protected $table = 'drivers';

	protected $fillable = [
		'name',
		'last_name',
		'number_of_tickets'
	];

	protected $guarded = [
		'id'
	];

	public function trucks(){
		return $this->hasMany('trucks');
	}

	public function routes(){
		return $this->hasMany('routes');
	}

	public function bills(){
		return $this->hasMany('bills');
	}

}
