<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;

class Role extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    const KEY_ADMIN = 'ADM';
    const KEY_ALLIANCE_ADMIN = 'AAD';
    const KEY_USER = 'USE';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'key',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];

    /**
     * Get the user associated with the role.
     *
     * @return HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}