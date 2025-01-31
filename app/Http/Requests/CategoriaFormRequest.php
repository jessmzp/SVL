<?php

namespace SistemaVentasLinea\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaFormRequest extends FormRequest
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
            'iddepto'=>'required',
            'nombre'=>'required|max:100',
            'descripcion'=>'required|max:500',

        ];
    }
}
