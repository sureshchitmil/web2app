<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class AppSettings extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'app_settings';

    /**
     * @var string[]
     */
    protected $fillable = [
        'key',
        'value',
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
        'key' => 'string',
        'value' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
