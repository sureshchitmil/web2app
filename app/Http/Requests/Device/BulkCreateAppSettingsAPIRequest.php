<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateAppSettingsAPIRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'data.*.key' => ['nullable', 'string'],
            'data.*.value' => ['nullable'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
