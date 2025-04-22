<?php

namespace App\Http\Requests\agenda;

use Illuminate\Foundation\Http\FormRequest;

class AgendaStoreRequest extends FormRequest
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
           'title' => 'required',
           'description' => 'required',
           'start_time' => 'required',
           'end_time' => "required",
           'conference_id' => 'nullable',
           'event_id' => 'nullable',
           'event_speaker_id' => 'nullable',
           'conference_speaker_id' => "nullable"
        ];
    }
}
