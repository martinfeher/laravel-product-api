<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateproductRequest extends FormRequest
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
            'name' => 'max:1000',  
            'excerpt' => 'max:8000',     
            'description' => 'max:40000',   
            'product_number' => 'numeric',   
            'featured_image' => 'max:2000',   
            'image' => 'url|max:2047',
            'price' => 'numeric',
            'sale_price' => 'integer',
            'sale_sale_price_valueprice' => 'numeric',
            'stock_quantity' => 'integer',
            'reviews_allowed' => 'integer',
            'rating_items' => 'integer',
            'rating' => 'integer|max:5',
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
