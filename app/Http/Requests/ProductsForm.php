<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductsForm extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			//
			'product_name' => 'required',
			'price' => 'required|numeric'
		];
	}

	public function messages(){

		return [
			'product_name.required' => 'El campo Nombre del Producto es requerido.',
			'price.required' => 'El campo Precio es requerido.',
			'price.numeric' => 'El campo Precio debe ser un n&uacute;mero.'

		];
	}

}
