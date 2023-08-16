<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProviderRequest extends FormRequest
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
        'name'=>'required|string|max:255',

        'email'=>'required|email|string|unique:providers,email,'.
        $this->route('provider')->id.'|max:255',

        'rif'=>'required|string|min:6|unique:providers,rif,'.
        $this->route('provider')->id.'|max:11',

        'address'=>'nullable|string|max:255',
        'phone'=>'required|numeric|unique:providers,phone,'.
        $this->route('provider')->id.'|min:11',

        ];
    }
    public function messages(){
        return [
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto',
            'name.max'=>'solo se permite 50 caracteres',

            'email.required'=>'Este campo es requerido',
            'email.email'=>'No es un correo electronico',
            'email.max'=>'Solo se permite 200 caracteres',
            'email.unique'=>'Ya se encuentra registrado',

            'rif.required'=>'Este campo es requerido',
            'rif.string'=>'El valor no es correcto',
            'rif.max'=>'Solo se permite 11 caracteres',
            'rif.min'=>'Se requiere de 11 caracteres',
            'rif.unique'=>'Ya se encuentra registrado',

            'address.required'=>'Este campo es requerido',
            'address.string'=>'El valor no es correcto',

            'phone.required'=>'Este campo es requerido',
            'phone.numeric'=>'El valor no es numerico',

            'phone.min'=>'Se requiere de 11 caracteres',
            'phone.unique'=>'Ya se encuentra registrado',

        ];
    }
}
