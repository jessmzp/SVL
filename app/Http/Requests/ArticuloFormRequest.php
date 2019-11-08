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
            'nombre'=>'required|max:100',
            'descripcion'=>'required|max:500',
            'precio'=>'required|between:0,9999.9999',
            'stock'=>'required|numeric',
            'imagen'=>'required|mimes:jpg,jpeg,png,bmp',
            'detalle'=>'required|max:200',
            'estado'=>'required|max:20',
        ];
    }
}

