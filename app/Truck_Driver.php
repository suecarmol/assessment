<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck_Driver extends Model {

	//
	protected $table = 'trucks_drivers';

	protected $fillable = [
		'truck_id',
		'driver_id',
		'date_assigned'
	];

	protected $guarded = [

	];

	public function trucks(){
		return $this->hasMany('trucks');
	}

	public function drivers(){
		return $this->hasMany('drivers');
	}

}
