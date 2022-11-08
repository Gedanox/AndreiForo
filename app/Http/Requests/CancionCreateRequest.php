<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CancionCreateRequest extends FormRequest
{
    
    function attributes(){
        return [
            'titulo'     => 'Título de la canción',
            'interprete' => 'Interprete de la canción',
            'autor'      => 'Autor de la canción',
            'duracion'   => 'Duración de la canción',
            'genero'     => 'Género de la canción',
            'album'      => 'Álbum de la canción',
            'orden'      => 'Orden de la canción en el álbum',
            'fecha'      => 'Fecha de la publicación de la canción',
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
            'titulo'     => 'required|string|max:80|min:2|unique:cancion,titulo',
            'interprete' => 'required|string|max:100|min:2',
            'autor'      => 'nullable|string|max:100|min:2',
            'duracion'   => 'nullable|date_format:H:i:s',
            'genero'     => 'required|string|max:20|min:2',
            'album'      => 'nullable|string|max:70|min:2',
            'orden'      => 'nullable|numeric|gte:1|lte:50',
            'fecha'      => 'required|date',
            //['album', 'orden']=> 'unique:cancion,album,orden'
        ];
    }
    
    function messages() {
        $required = 'El campo :attribute es obligatorio.';
        $string   = 'El campo :attribute tiene que ser una cadena de caracteres.';
        $max      = 'El longitud máxima del campo :attribute es :max';
        $min      = 'El longitud mínima del campo :attribute es :min';
        
        return [
            'titulo.required'      => $required,
            'titulo.string'        => $string,
            'titulo.max'           => $max,
            'titulo.min'           => $min,
            'titulo.unique'        => 'You can´t do it, the song is already there.',
            'interprete.required'  => $required,
            'interprete.string'    => $string,
            'interprete.max'       => $max,
            'interprete.min'       => $min,
            'genero.required'      => $required,
            'genero.string'        => $string,
            'genero.max'           => $max,
            'genero.min'           => $min,
            'fecha.required'       => $required,
            'fecha.date'           => 'El campo :attribute tiene que ser una fecha en formato dd/mm/aaaa.',
            'autor.string'         => $string,
            'autor.max'            => $max,
            'autor.min'            => $min,
            'duracion.date_format' => 'El campo :attribute tiene que ser un tiempo en formato hh:mm:ss',
            'album.string'         => $string,
            'album.max'            => $max,
            'album.min'            => $min,
            'orden.numeric'        => 'El campo :attribute tiene que ser un número',
            'orden.gte'            => 'El campo :attribute tiene que ser mayor que :value',
            'orden.lte'            => 'El campo :attribute tiene que ser menor que :value',
        ];
    }
}