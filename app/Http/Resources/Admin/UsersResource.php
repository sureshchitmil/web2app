<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class UsersResource extends BaseAPIResource
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        $fieldsFilter = $request->get('fields');
        if (!empty($fieldsFilter) || $request->get('include')) {
            return $this->resource->toArray();
        }

        return [
            'id' => $this->id,
            'email' => $this->email,
            'password' => $this->password,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
