<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Walkthrough extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'walkthroughs';

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'subtitle',
        'image',
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
        'subtitle' => 'string',
        'image' => 'string',
        'status' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
