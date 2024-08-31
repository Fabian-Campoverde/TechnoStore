<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderRequest extends FormRequest
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
            "razon_social"=> "required|unique:providers",
            "ruc"=> "required|numeric|min:0|max:99999999999|unique:providers",
            "nombre"=> "required",
            "telefono"=> "required|numeric|min:0|max:999999999",
            "direccion"=> "required",
        ];
    }
}
