<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class RightHeaderIconResource extends BaseAPIResource
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
            'title' => $this->title,
            'value' => $this->value,
            'image' => $this->image,
            'type' => $this->type,
            'url' => $this->url,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_active' => $this->is_active,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
