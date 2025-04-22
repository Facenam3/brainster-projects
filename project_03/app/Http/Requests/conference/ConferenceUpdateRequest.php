<?php

namespace App\Http\Requests\conference;

use Illuminate\Foundation\Http\FormRequest;

class ConferenceUpdateRequest extends FormRequest
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
            'title' => 'required|sometimes',
            'theme' => 'required|sometimes',
            'objective' => 'required|sometimes',
            'date' => 'required|sometimes',
            'location' => 'required|sometimes',
            'status' => "required|sometimes",
            'description' => 'required|sometimes',
            'ticket_id' => 'nullable',
            'speakers_id' => 'nullable'
        ];
    }
}
