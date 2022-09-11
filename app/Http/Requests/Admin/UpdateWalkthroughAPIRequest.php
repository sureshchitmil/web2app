<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWalkthroughAPIRequest extends FormRequest
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
            'subtitle' => ['nullable'],
            'image' => ['nullable', 'string'],
            'status' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
