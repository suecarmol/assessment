<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersForm extends Request {

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
			'name' => 'required',
			'last_name' => 'required', 
			'email' => 'required|email',
			'password' => 'required',
			'company' => 'required',
			'user_type' => 'required'
		];
	}

	public function messages()
	{
		return [
			'name.required' => 'El campo Nombre es requerido.',
			'last_name.required' => 'El campo Apellidos es requerido.',
			'email.required' => 'El campo Correo electr&oacute;nico es requerido.',
			'password.required' => 'El campo Contrase&ntilde;a es requerido.',
			'company.required' => 'El campo Compa&ntilde;&iacute;a es requerido.',
			'user_type.required' => 'El campo Tipo de usuario es requerido.',
			'email.email' => 'El campo Correo electr&oacute;nico debe ser un correo v&aacute;lido.'

		];
	}

}
