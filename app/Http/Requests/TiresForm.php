<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class TiresForm extends Request {

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
			'brand' => 'required',
			'serial_number' => 'required',
			'date_added_to_truck' => 'required|date',
			'date_last_service' => 'required|date',
			'date_removed' => 'date',
			'truck_id' => 'required'
		];
	}

	public function messages()
	{

		return [
			'brand.required' => 'El campo Marca es requerido.', 
			'serial_number.required' => 'El campo No. de serie es requerido.',
			'date_added_to_truck.required' => 'El campo Agregada al cami&oacute;n es requerido.',
			'date_last_service.required' => 'El campo Fecha &uacute;ltimo servicio es requerido.', 
			'date_removed.date' => 'El campo Removida del cami&oacute;n debe ser una fecha.', 
			'truck_id.required' => 'El campo Cami&oacute;n es requerido.',
			'date_added_to_truck.date' => 'El campo Agregada al cami&oacute;n debe ser una fecha',
			'date_last_service.date' => 'El campo Fecha &uacute;ltimo servicio debe ser una fecha'
		];
	}

}
