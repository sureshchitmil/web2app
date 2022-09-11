<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTabsAPIRequest extends FormRequest
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
            'title' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'url' => ['nullable', 'string'],
            'status' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
