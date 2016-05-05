<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Page;

class PageRequest extends Request {

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
        $slug_rule = 'required|regex:/^([a-z0-9_\-]+)$/|unique:pages,slug';
        if($this->isMethod('PATCH')){
            $slug_rule .= ",".$this->route('pages')->id;
        }

		return [
            'name' => 'required|max:24',
            'slug' => $slug_rule,
            'desc' => 'max:255',
            'on_nav' => 'required'
		];
	}


}
