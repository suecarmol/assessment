<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ServicesForm extends Request {

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
			'start_of_service' => 'required|date',
			'end_of_service' => 'date',
			'type_of_service' => 'required',
			'number_of_delays' => 'required|numeric',
			'truck_id' => 'required'
		];
	}

	public function messages()
	{

		return [
			'start_of_service.required' => 'El campo Inicio de servicio es requerido.',
			'end_of_service.date' => 'El campo Fin de servicio debe ser una fecha.',
			'type_of_service.required' => 'El campo Tipo de servicio es requerido.',
			'number_of_delays.required' => 'El campo N&uacute;mero de demoras es requerido.',
			'truck_id.required' => 'El campo Cami&oacute;n es requerido.',
			'start_of_service.date' => 'El campo Inicio de servicio debe ser una fecha.',
			'number_of_delays.numeric' => 'El campo N&uacute;mero de demoras debe ser un n&uacute;mero.'
		];	

	}

}
