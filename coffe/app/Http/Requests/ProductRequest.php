<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->method() == 'PUT') {
            // Edit Form
            return [
                'name'          => 'required|unique:products,name,' . $this->id,
                'ref'           => 'required|unique:products,ref,' . $this->id,
                'price'         => 'required',
                'weight'        => 'required',
                'category'      => 'required',
                'stock'         => 'required',

            ];
        } else {
            // Create Form
            return [
                'name'        => 'required|unique:products,name',
                'ref'      => 'required|unique:products,ref',
                'price'      => 'required',
                'weight'     => 'required',
                'category'      => 'required',
                'stock'         => 'required',
            ];
        }
    }
    public function messages()
    { //Se personalizan los mensajes para cada campo requerido
        return [
            'name.required'         => 'El campo "Nombre" es obligatorio.',
            'ref.required'          => 'El campo "Referencia" es obligatorio.',
            'price.required'        => 'Debe escribir un precio',
            'weight.required'       => 'El campo "Peso" es obligatorio',
            'category.required'     => 'Debe seleccionar una categoría',
            'stock.required'        => 'El campo "Peso" es obligatorio',

        ];
    }
}
