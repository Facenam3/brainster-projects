<?php

namespace App\Http\Requests\comment;

use Illuminate\Foundation\Http\FormRequest;

class CommentUpdateRequest extends FormRequest
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
            'comment_body' => 'required|sometimes',
            'user_id' => 'required|sometimes',
            'blog_id' => 'required|sometimes',
            'parent_id' => 'nullable'
        ];
    }
}
