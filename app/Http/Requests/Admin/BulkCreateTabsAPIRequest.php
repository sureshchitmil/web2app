<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateTabsAPIRequest extends FormRequest
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
            'data.*.image' => ['nullable', 'string'],
            'data.*.url' => ['nullable', 'string'],
            'data.*.status' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
