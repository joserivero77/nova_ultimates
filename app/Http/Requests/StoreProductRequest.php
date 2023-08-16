<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'=>'string|required|unique:products|max:255',

            'precio_venta'=>'required|numeric',
            'precio_compra'=>'required|numeric',

        ];
    }
    public function messages(){
        return [
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto',
            'name.max'=>'solo se permite 255 caracteres',
            'name.unique'=>'El producto ya esta registrado',

            'precio_venta.required'=>'Este campo es requerido',
            'precio_venta.numeric'=>'Este valor no es numerico',

            'precio_compra.required'=>'Este campo es requerido',
            'precio_compra.numeric'=>'Este valor no es numerico',


        ];
    }
}
