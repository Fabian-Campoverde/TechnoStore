<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InputRequest extends FormRequest
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
            'comprobante' => 'required',
            'fechaCompra' => 'required',
            'provider_id' => 'required',
            'detalles' =>  [
                'required',
                'json',
                function ($attribute, $value, $fail) {
                    // Verifica si el valor no está vacío y es un JSON válido
                    if (empty($value) || !is_string($value) || json_decode($value) === null) {
                        $fail("El campo $attribute debe ser un JSON válido y contener al menos un elemento.");
                    } else {
                        $detalles = json_decode($value, true);
                        if (empty($detalles) || !is_array($detalles)) {
                            $fail("El campo $attribute debe contener al menos un elemento.");
                        }
                    }
                },
            ],
        ];
    }
}
