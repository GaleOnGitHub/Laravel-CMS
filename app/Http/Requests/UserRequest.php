<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

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
        $password_rule = 'required|min:8|confirmed';
        $email_rule = 'required|email|unique:users,email';

        if($this->isMethod('PATCH')){
            $password_rule = "";
            $email_rule .= ",".$this->route('users')->id;
        }

		return [
			'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => $email_rule,
            'password' => $password_rule
		];
	}

}
