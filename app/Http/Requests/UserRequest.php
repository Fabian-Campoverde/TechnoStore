<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "name"=> "required",
            'image_url'=> ['image','required'],
            'email'=> 'email|required|unique:users',
            'password'=> 'required',
            'roles' => 'required|array|min:1',
            'roles.*' => 'required|numeric',
            'nickname'=> 'required|unique:users',
        ];
    }
}
