<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserPersonalInfoRequest extends FormRequest
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
            'name'          => 'required|string|max:30',
            'surname'       => 'required|string|max:30',
            'email'         => 'required|string|email|max:255|unique:users,email, '. Auth()->guard('web')->user()->id . ',id',
            'phone'         => 'required|size:17|unique:users,phone, '. Auth()->guard('web')->user()->id . ',id',
            'date'          => 'required',
            'month'         => 'required',
            'year'          => 'required',
            'address'       => 'required|string|max:255',
            'zip'           => 'required|size:6',
            'password'      => 'nullable|min:6|confirmed'
        ];
    }
}
