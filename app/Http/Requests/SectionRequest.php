<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SectionRequest extends Request {

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

        $alias_rule = 'required|regex:/^([a-z0-9_-]+)$/|unique:pages,slug';
        if($this->isMethod('PATCH')){
            $alias_rule .= ",".$this->route('sections')->id;
        }
		return [
            'name' => 'required|max:24',
            'alias' => $alias_rule,
            'header' => 'max:48',
            'order' => 'required|integer',
            'desc' => 'required|max:255',
            'all_pages' => '',
            'page_id' => '',
        ];
	}

}
