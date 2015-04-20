<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model {

	//
	protected $table = 'routes';

	protected $fillable = [
		'origin',
		'destination',
		'date_of_departure',
		'driver_id'
	];

	protected $guarded = [
		'id'
	];

	public function drivers()
	{
		$this->belongsTo('App\Driver');
	}

	public function users()
	{
		$this->hasMany('App\User');
	}
}
