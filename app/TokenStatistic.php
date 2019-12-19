<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TokenStatistic extends Model
{
    /**
     * The fillable values
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'success',
        'ip_address',
        'token_id',
        'request',
    ];

    /**
     * Casting array
     *
     * @var array
     */
    protected $casts = [
        'success' => 'bool',
        'request' => 'collection',
    ];

    /**
     * Doesn't have timestamps
     *
     * @var bool
     */
    public $timestamps = false;
}
