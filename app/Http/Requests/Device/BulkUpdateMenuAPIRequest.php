<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateMenuAPIRequest extends FormRequest
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
            'data.*.type' => ['nullable', 'string'],
            'data.*.image' => ['nullable', 'string'],
            'data.*.url' => ['nullable', 'string'],
            'data.*.status' => ['nullable', 'integer'],
            'data.*.parent_id' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
