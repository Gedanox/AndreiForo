<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostEditRequest extends FormRequest
{
    
    function attributes(){
        return [
            'message'     => 'Post text',
        ];
    }

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'message'     => 'string|max:100',
            
        ];
    }
    
    function messages() {
        $required = 'El campo :attribute es obligatorio.';
        $string   = 'El campo :attribute tiene que ser una cadena de caracteres.';
        $max      = 'El longitud máxima del campo :attribute es :max';
        $min      = 'El longitud mínima del campo :attribute es :min';
        
        return [
            'message.string'        => $string,
            'message.max'           => $max,
        ];
    }
}