<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class StoreProductRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => "required|string|max:255",
            'price' => "required|numeric|min:0",
            'description' => "nullable|string",
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            'name.required' => ':attribute wajib diisi.',
            'name.string' => ':attribute tidak boleh berupa angka.',
            'name.min' => ':attribute minimal 3 karakter.',
            'name.max' => ':attribute maksimal 255 karakter.',
            'price.required' => ':attribute wajib diisi.',
            'price.numeric' => ':attribute harus berupa angka.',
            'price.min' => ':attribute tidak boleh kurang dari 0.',
            'price.max' => ':attribute maksimal Rp. 50.000.000.',
            'description.max' => ':attribute maksimal 500 karakter.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => "Nama produk",
            'price' => "Harga produk",
            'description' => "Deskripsi",
        ];
    }
}
