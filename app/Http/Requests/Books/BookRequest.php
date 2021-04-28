<?php

namespace App\Http\Requests\Books;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:100',
            'publishing' => 'required|string|max:100',
            'publish_date' => 'required|date',
            'authors.*' => 'exists:authors,id',
            'description' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'authors.*.exists' => 'The selected author does not exist,',
        ];
    }
}
