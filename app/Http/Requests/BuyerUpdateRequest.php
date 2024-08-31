<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BuyerUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "documento"=>"required",
            "nro_doc"=>[
                'required',
                'numeric',
                'min:0',
                
                Rule::unique('buyers')->ignore($this->buyer->id),
            ],
            "nombre"=> "required",
            "telefono"=> "required|numeric|min:0|max:999999999",
            "direccion"=> "required",
            "correo"=> "required|email",
        ];
    }
}
