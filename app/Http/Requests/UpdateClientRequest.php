<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'name'=>'string|required|max:255',
            'cedula'=>'numeric|required|unique:clients,cedula,'.
            $this->route('client')->id.'|min:7',
            'rif'=>'string|min:11|required|unique:clients,rif,'.
            $this->route('client')->id.'|max:11',
            'address'=>'string|required|unique:clients,address,'.
            $this->route('client')->id.'|max:255',
            'phone'=>'numeric|required|unique:clients,phone,'.
            $this->route('client')->id.'|min:11',
            'email'=>'string|unique:clients,email,'.
            $this->route('client')->id.'|max:255',

        ];
    }
    public function messages(){
        return [
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto',
            'name.max'=>'Solo se permite 255 caracteres',

            'cedula.required'=>'Este campo es requerido',
            'cedula.numeric'=>'El valor no es numerico',
            'cedula.min'=>'Debe ingresar entre 7 y 8 digitos',


            'cedula.unique'=>'Esta cedula ya se encuentra registrada',

            'rif.required'=>'Este campo es requerido',
            'rif.string'=>'El valor no es correcto',
            'rif.max'=>'Solo se permite 11 digitos',
            'rif.min'=>'Solo se permite 11 digitos',
            'rif.unique'=>'Este RIF ya se encuentra registrado',


            'address.required'=>'Este campo es requerido',
            'address.max'=>'Solo se permite 250 caracteres',

            'phone.required'=>'Este campo es requerido',
            'phone.numeric'=>'El valor no es numerico',
            'phone.min'=>'Solo se permite 11 digitos',
            'phone.unique'=>'Este telefono ya se encuentra registrado',


            'email.string'=>'El valor no es correcto',
            'email.max'=>'Solo se permite 255 caracteres',
            'email.email'=>'No es un correo electronico',
            'email.unique'=>'La direccion de correo electronico ya se encuentra registrada',


        ];
    }
}
