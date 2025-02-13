<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\CarFilterEnum;

class CarFilterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'filter' => ['nullable', 'in:' . implode(',', CarFilterEnum::values())],
        ];
    }
}
