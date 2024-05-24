<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|gt:0',
            'stock' => 'required|numeric|gte:0',
            'image' => 'image',
        ];
    }
}
