<?php

namespace SistemaVentasLinea\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubcategoriaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'idcategoria'=>'required',
            'nomsubcategoria'=>'required|max:100',
            'descrisubcategoria'=>'required|max:500',
        ];
    }
}
