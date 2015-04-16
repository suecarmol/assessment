<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;


class ProductsController extends Controller {

	//
	public function index(){

		$products = Product::all();

		return view('products.index', compact('products'));

		//you can also return 
		//return view('products.index')->with('products', $products);

	}

	public function create(){

		return view('products.create');

	}

	//public function 

}
