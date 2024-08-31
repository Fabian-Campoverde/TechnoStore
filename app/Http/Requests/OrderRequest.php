<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'document_type' => 'required|string|max:50',
            'document_number' => [
                'required',
                'string',
                'max:20',
                'regex:/^\d+$/', // Solo números
            ],
            'address' => 'required|string|max:255',
            'department' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'zone' => 'nullable|string|max:100',
            'reference' => 'nullable|string|max:255',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'user_id' => 'required|exists:users,id',
            'payment_image'=> ["image"],
            'payment_date' => 'required|date',
            'operation_code' => 'required|string|max:255',
            'total' => 'required|numeric|min:0',
            'detalles' => [
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
