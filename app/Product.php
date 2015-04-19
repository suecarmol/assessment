<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	//

	protected $table = 'products';

	protected $fillable = [
		'product_name',
		'price'
	];

	protected $guarded = [
		'id'
	];

	// A product can be in many orders
	public function orders()
	{

		return $this->hasMany('App\Order');
	}

}
