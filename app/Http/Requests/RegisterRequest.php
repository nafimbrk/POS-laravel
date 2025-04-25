<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'nama wajib diisi',
            'name.string' => 'nama tidak boleh angka/simbol',
            'email.required' => 'email wajib diisi',
            'email.email' => 'harus berupa email',
            'email.unique' => 'email sudah ada di database',
            'password.required' => 'password tidak boleh kosong',
        ];
    }
}
