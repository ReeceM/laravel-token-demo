<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Token extends Model
{
    use SoftDeletes;
    /**
     * Fillable attributes
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'api_token',
        'limit'
    ];

    /**
     * The things that are hidden
     *
     * @var array
     */
    protected $hidden = ['api_token'];

    /**
     * The user relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * THe stats of the token
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tokenStatistic(): HasMany
    {
        return $this->hasMany(TokenStatistic::class);
    }
}
