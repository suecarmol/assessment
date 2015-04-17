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
}
