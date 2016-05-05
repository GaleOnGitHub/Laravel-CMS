<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Page;
use App\Models\Style;
use Illuminate\Support\Facades\DB;

class StyleRequest extends Request {

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
        if($this->input('active')=='1')
        {
            DB::table('styles')->update(['active'=> 0]);
//            $styles = Style::all();
//            foreach($styles as $st){
//                $st->active = 0;
//                $st->save();
        }

        return [
            'name' => 'required|max:24',
            'desc' => 'max:255',
            'css' => 'required',
            'active' => 'required|boolean'
        ];
	}


}
