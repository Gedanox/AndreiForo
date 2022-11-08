<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CancionEditRequest extends CancionCreateRequest
{
    
    public function rules()
    {
        $rules = parent::rules();
        {
            $rules['titulo'] = 'required|string|max:80|min:2|unique:cancion,titulo,' . $this->cancion->id;
        }
    }
}