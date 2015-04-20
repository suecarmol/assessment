<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class TrucksDriversForm extends Request {

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
			'truck_id' => 'required',
			'driver_id' => 'required',
			'date_assigned' => 'required|date'
		];
	}

	public function messages()
	{
		return [
			'truck_id.required' => 'El campo Cami&oacute;n es requerido.',
			'driver_id.required' => 'El campo Chofer es requerido.',
			'date_assigned.required' => 'El campo Fecha de asignaci&oacute;n es requerido.',
			'date_assigned.date' => 'El campo Fecha de asignaci&oacute;n debe ser una fecha'
		];	
	}

}
