<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Menu extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'menus';

    /**
     * @var string[]
     */
    protected $fillable = [
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
     * @var string[]
     */
    protected $casts = [
        'title' => 'string',
        'type' => 'string',
        'image' => 'string',
        'url' => 'string',
        'status' => 'integer',
        'parent_id' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
