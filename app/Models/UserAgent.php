<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class UserAgent extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'user_agents';

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'android',
        'ios',
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
        'android' => 'string',
        'ios' => 'string',
        'status' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
