<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateRightHeaderIconAPIRequest extends FormRequest
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
            'value' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'type' => ['nullable', 'string'],
            'url' => ['nullable', 'string'],
            'status' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
