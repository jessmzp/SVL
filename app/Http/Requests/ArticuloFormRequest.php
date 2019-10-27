<?php

namespace SistemaVentasLinea\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloFormRequest extends FormRequest
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
            'idcategoria'=>'required',
            'idsubcategoria'=>'required',
            'nomarticulo'=>'required|max:100',
            'descriparticulo'=>'required|max:500',
            'precioarticulo'=>'required|float',
            'stockarticulo'=>'required|numeric',
            'imagenarticulo'=>'mimes:jpeg,bmp,png',
            'detallearticulo'=>'required|max:50',
            'estado'=>'required|numeric',
        ];
    }
}
