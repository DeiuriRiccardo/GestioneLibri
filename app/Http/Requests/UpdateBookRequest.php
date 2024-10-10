<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:100',
            'author_id' => 'required|integer|exists:authors,id',
            'category_id' => 'required|integer|exists:categories,id',
            'pages' => 'required|integer|min:1',
            'description' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'è richiesto',
            'title.max' => 'Non puoi superare i :max caratteri',
            'author_id.required' => 'scegli una tipologia',
            'category_id.required' => 'scegli una categoria',
        ];
    }
}
