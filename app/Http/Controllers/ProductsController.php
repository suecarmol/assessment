<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Post;
use App\Http\Requests\ProductsForm;


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

	public function store(ProductsForm $productForm){

		$input = new Product;

		$input->product_name = \Request::input('product_name');
		$input->price = \Request::input('price');
		$input->save();

		return redirect('products')->with('message', 'Se han guardado correctamente los datos.');

	}

}
