<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Gumball extends Model
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'key',
        'description',
        'image',
        'faction_id'
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
     * Get the user associated with the gumball.
     *
     * @param integer $userId
     *
     * @return BelongsToMany
     */
    public function user($userId)
    {
        return $this->belongsToMany(Gumball::class, 'user_gumballs')
            ->withTimestamps()
            ->where('user_gumballs.user_id', '=', $userId)
            ->where('user_gumballs.gumball_id', '=', $this->id);
    }

    /**
     * Get the faction associated with the gumball.
     *
     * @return HasOne
     */
    public function faction()
    {
        return $this->hasOne(Faction::class, 'id', 'faction_id');
    }

    /**
     * Get the fates associated with the gumball.
     *
     * @return BelongsToMany
     */
    public function fates()
    {
        return $this->belongsToMany(Fate::class, 'fate_gumballs')
            ->withTimestamps();
    }

    /**
     * Get the user gumball associated with the gumball.
     *
     * @param integer $userId
     *
     * @return HasOne
     */
    public function userGumball($userId)
    {
        return $this->hasone(UserGumball::class, 'user_gumballs', 'gumball_id')
            ->where('user_gumballs.user_id', '=', $userId)
            ->where('user_gumballs.gumball_id', '=', $this->id);
    }
}
