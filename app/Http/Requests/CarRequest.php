<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'is_registered' => ['required','boolean'],
            'registration_number' => ['required_if:is_registered,true','max:15','nullable'],

            //validacia pre parts
            'parts' => ['nullable','array'],
            'parts.*.name' => ['required','string','max:255'],
            'parts.*.serial_number' => ['required','string','unique:parts','max:100']
        ];
        if ($this->isMethod('post')) {
            $rules['registration_number'] = 'unique:cars,registration_number';
            }

        return $rules;
    }
}
