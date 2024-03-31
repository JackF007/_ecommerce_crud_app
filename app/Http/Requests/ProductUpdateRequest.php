<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'qnt' => 'required|numeric|min:0',
            'prezzo' => 'required|numeric|min:0',
            'descrizione' => 'nullable|string',
            'image' => 'nullable|image|max:1999',
            'category_id'=>'nullable|exists:categories,id',
        ];
    }
}
