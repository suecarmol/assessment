<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class OrdersForm extends Request {

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
			'comapny_name' => 'required',
			'product_quantity' => 'required|numeric', 
			'date_of_delivery' => 'required|date',
			'destination' => 'required',
			'product_id' => 'required',
			'truck_id' => 'required'
		];
	}

	public function messages()
	{
		return [
			'comapny_name.required' => 'El campo Compa&ntilde;&iacute;a es requerido.', 
			'product_quantity' => 'El campo Cantidad es requerido.',
			'date_of_delivery' => 'El campo Fecha de entrega es requerido.',
			'destination' => 'El campo Destino es requerido.', 
			'product_id' => 'El campo Producto es requerido.',
			'truck_id' => 'El campo Cami&oacute;n es requerido.', 
			'product_quantity.numeric' => 'El campo Cantidad debe ser una n&uacute;mero.',
			'date_of_delivery' => 'El campo Fecha de entrega debe ser una fecha.'
		];
	}

}
