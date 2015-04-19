<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

	//
	protected $table = 'services';

	protected $fillable = [
		'start_of_service',
		'end_of_service',
		'type_of_service',
		'number_of_delays', 
		'truck_id',
	];

	protected $guarded = [
		'id'
	];

	//A service is made by a user
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	//A service is done to a truck
	public function truck()
	{
		return $this->belongsTo('App\Truck');
	}
}
