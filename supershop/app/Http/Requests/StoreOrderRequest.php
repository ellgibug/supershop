<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreOrderRequest extends FormRequest
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
            'delivery_type' => 'required', Rule::in(['1','2']),
            'payment_type'  => 'required', Rule::in(['1','2']),
            'address'       => 'required|string|max:255',
            'zip'           => 'required|size:6',
        ];
    }
}
