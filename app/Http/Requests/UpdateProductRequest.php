<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name'=>'string|required|unique:products,name,'.
            $this->route('product')->id.'|max:255',


        ];
    }
    public function messages(){
        return [
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto',
            'name.max'=>'solo se permite 255 caracteres',
            'name.unique'=>'El producto ya esta registrado',

            'precio_compra.required'=>'Este campo es requerido',
            'precio_compra.numeric'=>'Este valor no es numerico',

            'precio_venta.required'=>'Este campo es requerido',
            'precio_venta.numeric'=>'Este valor no es numerico',

            'category_id.required'=>'Este campo es requerido',
            'category_id.integer'=>'El valor tiene que ser entero',
            'category_id.exists'=>'La categoria no existe',

            'Provider_id.required'=>'Este campo es requerido',
            'Provider_id.integer'=>'El valor tiene que ser entero',
            'Provider_id.exists'=>'El proveedor no existe',

        ];
    }

}
