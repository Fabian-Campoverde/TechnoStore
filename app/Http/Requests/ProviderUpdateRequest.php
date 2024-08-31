<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProviderUpdateRequest extends FormRequest
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
            "razon_social"=> [
                "required",
                Rule::unique('providers')->ignore($this->provider->id),
        ],
            "ruc"=> [
                'required',
                'numeric',
                'min:0',
                'max:99999999999',
                Rule::unique('providers')->ignore($this->provider->id),
            ],
            "nombre"=> "required",
            "telefono"=> "required|numeric|min:0|max:999999999",
            "direccion"=> "required",
        ];
    }
}
