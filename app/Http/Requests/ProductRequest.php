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
            'image' => 'mimes:jpeg,jpg,png,gif,webp',
            'name' => 'required',
            'category_id' => 'required',
            'stock' => 'required',
            'price' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'image.mimes:jpeg,jpg,png,gif' => 'gambar harus berformat jpeg/jpg/png/gif/webp',
            'name.required' => 'nama produk wajib diisi',
            'category_id.required' => 'kategori wajib diisi',
            'stock.required' => 'stok wajib diisi',
            'price.required' => 'harga wajib diisi'
        ];
    }
}
