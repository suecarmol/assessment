<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class RoutesForm extends Request {

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
			'origin' => 'required',
			'destination' => 'required',
			'date_of_departure' => 'required|date',
			'driver_id' => 'required'
		];
	}

	public function messages()
	{
		return [
			'origin.required' => 'El campo origen es requerido.',
			'destination.required' => 'El campo destino es requerido.',
			'date_of_departure.required' => 'El campo Fecha de salida es requerido.',
			'driver_id.required' => 'El campo Chofer es requerido.',
			'date_of_departure.date' => 'El campo Fecha de salida debe ser una fecha.'
		];
	}

}
