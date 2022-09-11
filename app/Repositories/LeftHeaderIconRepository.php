<?php

namespace App\Repositories;

use App\Models\LeftHeaderIcon;

class LeftHeaderIconRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'title',
        'value',
        'image',
        'type',
        'url',
        'status',
        'created_at',
        'updated_at',
        'is_active',
        'added_by',
        'updated_by',
    ];

    /**
     * @return string[]
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * @return string
     */
    public function model(): string
    {
        return LeftHeaderIcon::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
