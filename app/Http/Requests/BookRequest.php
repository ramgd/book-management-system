<?php

namespace App\Http\Requests;

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
            'title' => 'required|string|max:255',
            // 'author' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            // 'price' => 'required|numeric|min:0',
            // 'published_date' => 'required|date',
            'price' => 'required|numeric|min:0',
            'published_date' => 'required|date',
            'cover_image' => 'nullable|url'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Book title is required',
            'author.required' => 'Author name is required',
            'price.required' => 'Price is required',
            // 'price.required' => 'Price is required',
            'price.numeric' => 'Price must be number',
            'published_date.required' => 'Published date is required',
            'cover_image.url' => 'Please enter valid URL'
        ];
    }
}