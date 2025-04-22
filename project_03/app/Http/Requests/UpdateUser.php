<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'name' => 'required|sometimes',
            'surname' => 'required|sometimes',
            'email' => 'required|sometimes',
            'password' => 'required|sometimes',
            'title' => 'required|sometimes',
            'phone' => 'required|sometimes',
            'city' => 'required|sometimes',
            'country_id' => 'required|sometimes',
            'bio' => 'required|sometimes',
            'userType' => 'required|sometimes',
            'profile_picture' => 'nullable',
            'cv_upload' => 'nullable'
        ];
    }
}
