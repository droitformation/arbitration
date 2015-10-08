<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SendRequest extends Request
{
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
            'title'      => 'required',
            'first_name' => 'required',
            'last_name'  => 'required',
            'street'     => 'required',
            'place'      => 'required',
            'country'    => 'required',
            'email'      => 'required|email',
        ];
    }
}
