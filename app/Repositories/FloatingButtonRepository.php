<?php

namespace App\Repositories;

use App\Models\FloatingButton;

class FloatingButtonRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'title',
        'image',
        'url',
        'status',
        'is_active',
        'created_at',
        'updated_at',
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
        return FloatingButton::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
