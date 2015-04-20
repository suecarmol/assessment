<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class BillsForm extends Request {

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
			'company_name' => 'required',
			'quantity_delivered' => 'required|numeric',
			'total_price' => 'required|numeric',
			'valid_thru' => 'required|date',
			'driver_id' => 'required'
		];
	}

	public function messages()
	{
		return [
			'company_name.required' => 'El campo Compa&ntilde;&iacute;a es requerido.',
			'quantity_delivered.required' => 'El campo Cantidad entregada es requerido.',
			'total_price.required' => 'El campo Precio total es requerido.',
			'valid_thru.required' => 'El campo V&ascute;lida hasta es requerido.',
			'driver_id.required' => 'El campo Chofer es requerido.',
			'quantity_delivered.numeric' => 'El campo Cantidad entregada debe ser un n&uacute;mero.',
			'total_price.numeric' => 'El campo Precio total debe ser un n&uacute;mero.', 
			'valid_thru.date' => 'El campo V&ascute;lida hasta debe ser una fecha.'
		];

	}

}
