<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	//

	protected $table = 'orders';

	protected $fillable = [
		'comapny_name',
		'product_quantity',
		'date_of_delivery',
		'destination',
		'truck_id',
		'product_id', 
		'total_price'

	];

	protected $guarded = [
		'id'
	];

	//An order is made by a user
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	//An order is delivered by a truck
	public function truck()
	{
		return $this->belongsTo('App\Truck');
	}

	//An order is made with a product
	public function product()
	{
		return $this->belongsTo('App\Product');
	}


}
