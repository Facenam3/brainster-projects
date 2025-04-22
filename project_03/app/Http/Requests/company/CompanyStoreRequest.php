<?php

namespace App\Http\Requests\company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
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
            'general' => 'required',
            'about_us' => 'required',
            'contact' => 'required',
            'location' => 'required',
            'hero_image' => 'nullable'
        ];
    }
}
