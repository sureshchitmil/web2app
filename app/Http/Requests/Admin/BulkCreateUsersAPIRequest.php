<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateUsersAPIRequest extends FormRequest
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
            'data.*.email' => ['nullable', 'string'],
            'data.*.password' => ['nullable', 'string'],
            'data.*.first_name' => ['nullable', 'string'],
            'data.*.last_name' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
