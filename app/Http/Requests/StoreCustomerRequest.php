<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCustomerRequest extends FormRequest
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
            'first_name' => 'required|max:80',
            'last_name' => 'required|max:120',
            'email' => 'required|unique:customers',
            'phone_number' => 'max:40',
        ];
    }


    /**
     * Return custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'The :attribute field is required.',
            'last_name.required' => 'The :attribute field is required.',
            'email.unique' => ':attribute is already used',
            'phone_number.max' => 'The :attribute must not be greater than 30 characters.',
        ];
    }

    /**
     * Return response with the validation errors in the predescribed format.
     *
     * @return array
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }

}