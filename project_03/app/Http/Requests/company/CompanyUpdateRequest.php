<?php

namespace App\Http\Requests\company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
            'general' => 'required|sometimes',
            'about_us' => 'required|sometimes',
            'contact' => 'required|sometimes',
            'location' => 'required|sometimes',
            'hero_image' => 'nullable'
        ];
    }
}
