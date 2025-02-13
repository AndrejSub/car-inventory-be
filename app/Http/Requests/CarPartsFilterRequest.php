<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\CarPartsFilterEnum;

class CarPartsFilterRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Môže byť upravené pre autorizáciu
    }

    public function rules()
    {
        return [
            'filter' => ['nullable', 'in:' . implode(',', CarPartsFilterEnum::values())]
        ];
    }
}
