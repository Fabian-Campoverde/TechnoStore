<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'nombre'=>"required",
            "codigoId"=> "required",
            "stock"=> "required|numeric|min:0",
            "precio_compra"=> "required|numeric|min:0",
            "precio_venta"=> "required|numeric|min:0",
            "category_id"=> "required|numeric",
            "brand_id"=> "required|numeric",
            "measure_id"=> "required|numeric",
            "stock_minimo"=> "numeric|min:0",
            "descripcion"=> "required|max:300",
            "provider_id"=> "required|numeric",
            // 'image_url' => 'image|required',
        ];
    }
}
