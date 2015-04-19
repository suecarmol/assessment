<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model {

	//

	protected $table = 'trucks';

	protected $fillable = [
		'model',
		'year', 
		'plates',
		'capacity',
		'date_last_service'
	];

	protected $guarded = [
		'id'
	];

	// A truck can deliver many orders
	public function orders()
	{

		return $this->hasMany('App\Order');
	}

	public function tires()
	{

		return $this->hasMany('App\Tire');
	}

}
