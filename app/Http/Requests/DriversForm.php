<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class DriversForm extends Request {

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
			'name' => 'required|alpha',
			'last_name' => 'required|alpha',
			'number_of_tickets' => 'required|integer'
		];
	}

	public function messages()
	{
		return [
			'name.required' => 'El campo Nombre es requerido',
			'last_name.required' => 'El campo Apellidos es requerido.',
			'number_of_tickets.required' => 'El campo N&uacute;mero de multas es requerido.',
			'name.alpha' => 'El campo Nombre solo puede tener letras.',
			'last_name.alpha' => 'El campo Apellidos solo puede tener letras',
			'number_of_tickets.integer' => 'El campo N&uacute;mero de multas solo puede ser un n&uacute;mero entero.'
		];
	}

}
