<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class LeftHeaderIcon extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'left_header_icons';

    /**
     * @var string[]
     */
    protected $fillable = [
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
     * @var string[]
     */
    protected $casts = [
        'title' => 'string',
        'value' => 'string',
        'image' => 'string',
        'type' => 'string',
        'url' => 'string',
        'status' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
