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

		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}

		$products = Product::all();

		return view('products.index', compact('products'));

		//you can also return 
		//return view('products.index')->with('products', $products);

	}

	public function create(){

		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}

		return view('products.create');

	}

	public function store(ProductsForm $productForm){

		$input = new Product;

		$input->product_name = \Request::input('product_name');
		$input->price = \Request::input('price');
		$input->save();

		return redirect('products')->with('message', 'Se han guardado correctamente los datos.');

	}

	public function edit($id){

		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}

		$product = Product::findOrFail($id);

		return view('products.edit', compact('product'));
	}

	public function update($id, ProductsForm $productForm){

		$input = Product::findOrFail($id);

		$input->product_name = \Request::input('product_name');
		$input->price = \Request::input('price');
		$input->save();

		return redirect('products')->with('message', 'Se han editado correctamente los datos.');

	}

	public function destroy($id){

		$input = Product::find($id);

		$input->delete();

		return redirect('products')->with('message', 'Se han eliminado correctamente los datos.');
	}

}
