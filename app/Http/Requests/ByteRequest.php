<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ByteRequest extends Request {

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
			'name' => 'required|min:3',
            'year' => 'integer|max:9999',
            'month' => 'integer|max:12',
            'day' => 'integer|max:31',
            'hours' => 'integer|max:24',
            'minutes' => 'integer|max:59',
            'seconds' => 'integer|max:59'
		];
	}

}
