<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class Fate extends Model
{
    use Notifiable;

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
     * Get the group the fate belongs to.
     *
     * @return belongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class, 'id', 'gumball_id');
    }

    /**
     * Get the gumball associated with the fate.
     *
     * @return BelongsToMany
     */
    public function gumballs()
    {
        return $this->belongsToMany(Gumball::class, 'fate_gumballs')
            ->withTimestamps();
    }

    /**
     * Get the user fate associated with the fate.
     *
     * @param integer $user
     *
     * @return HasOne
     */
    public function userFate($user)
    {
        return $this->hasOne(UserFate::class)
            ->where('user_fates.user_id', '=', $user);
    }
}
