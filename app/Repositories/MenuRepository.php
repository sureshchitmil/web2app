<?php

namespace App\Repositories;

use App\Models\Menu;

class MenuRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'title',
        'type',
        'image',
        'url',
        'status',
        'parent_id',
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
        return Menu::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
