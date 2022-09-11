<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateMenuAPIRequest extends FormRequest
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
            'type' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'url' => ['nullable', 'string'],
            'status' => ['nullable', 'integer'],
            'parent_id' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
