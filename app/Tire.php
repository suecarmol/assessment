<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tire extends Model {

	//
	protected $table = 'tires';

	protected $fillable = [
		'brand',
		'serial_number',
		'date_added_to_truck',
		'date_last_service',
		'date_removed',
		'truck_id'
	];	

	protected $guarded = [
		'id'
	];

	public function truck()
	{
		return $this->belongsTo('App\Truck');
	}

}
