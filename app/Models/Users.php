<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Users extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var string[]
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
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
        'email' => 'string',
        'password' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
