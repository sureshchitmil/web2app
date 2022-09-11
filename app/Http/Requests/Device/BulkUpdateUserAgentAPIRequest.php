<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateUserAgentAPIRequest extends FormRequest
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
            'data.*.title' => ['nullable', 'string'],
            'data.*.android' => ['nullable'],
            'data.*.ios' => ['nullable'],
            'data.*.status' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
