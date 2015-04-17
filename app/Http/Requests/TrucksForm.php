<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class TrucksForm extends Request {

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
			'model' => 'required',
			'year' => 'required|numeric',
			'plates' => 'required',
			'capacity' => 'required|numeric',
			'date_last_service' => 'required|date'
		];
	}

	public function messages(){

		return [
			'model.required' => 'El campo Modelo es requerido.',
			'year.required' => 'El campo A&ntildeo es requerido.',
			'plates.required' => 'El campo Placas es requerido.',
			'capacity.required' => 'El campo Capacidad es requerido.',
			'date_last_service.required' => 'El campo Fecha del &uacute;ltimo servicio es requerido.',
			'model.numeric' => 'El campo Modelo debe ser un n&uacute;mero.',
			'capacity.numeric' => 'El campo Capacidad debe ser un n&uacute;mero.',
			'date_last_service.date' => 'El campo Fecha del &uacute;ltimo servicio debe ser una fecha.'

		];
	}

}
