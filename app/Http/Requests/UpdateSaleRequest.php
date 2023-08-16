<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSaleRequest extends FormRequest
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
            //
        'client_id' => 'sometimes|integer',
        'user_id' => 'sometimes|integer',
        'sale_date' => 'sometimes|date',
        'tax' => 'sometimes|numeric',
        'total' => 'sometimes|numeric',
        'status' => 'sometimes|in:pending,approved,rejected',
        'product_id' => 'sometimes|array|min:1',
        'quantity' => 'sometimes|array|min:1|numeric',
        'price' => 'sometimes|array|min:1|numeric',
        'discount' => 'sometimes|array|min:1|numeric',
        ];
    }
}
