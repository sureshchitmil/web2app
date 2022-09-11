<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Tabs extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'tabs';

    /**
     * @var string[]
     */
    protected $fillable = [
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
     * @var string[]
     */
    protected $casts = [
        'title' => 'string',
        'image' => 'string',
        'url' => 'string',
        'status' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
