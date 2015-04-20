<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Bill extends Model {

	//
	protected $table = 'bills';

	protected $fillable = [
		'quantity_delivered',
		'total_price',
		'valid_thru',
		'is_paid_for',
		'driver_id'
	];

	protected $guarded = [
		'id'
	];

	//A bill is made by a user
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	
	//A bill is delivered by a driver
	public function driver()
	{
		return $this->belongsTo('App\Driver');
	}

}
