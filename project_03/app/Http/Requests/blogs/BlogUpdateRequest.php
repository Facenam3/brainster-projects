<?php

namespace App\Http\Requests\blogs;

use Illuminate\Foundation\Http\FormRequest;

class BlogUpdateRequest extends FormRequest
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
            'blog_title' => 'required',
            'user_id' => 'required',
            'paragraphs' => 'required|array',
            'paragraphs.*.title' => 'nullable',
            'paragraphs.*.content' => 'required',
        ];
    }
}
