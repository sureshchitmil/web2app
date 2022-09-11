<?php

namespace App\Repositories;

use App\Models\Users;

class UsersRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'email',
        'first_name',
        'last_name',
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
        return Users::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
