<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'brand' => 'required|string|max:100',
            'category' => 'required|string|max:100',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image_file' => 'nullable|file|image',
        ];
    }
} 