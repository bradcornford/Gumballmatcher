<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'alliance_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the gumballs associated with the user.
     *
     * @return HasMany
     */
    public function gumballs()
    {
        return $this->hasMany('App\UserGumball', 'user_id')
            ->join('gumballs', 'gumballs.id', 'user_gumballs.gumball_id');
    }

    /**
     * Get the factions gumballs associated with the user.
     *
     * @param integer $faction
     *
     * @return HasMany
     */
    public function factionGumballs($faction)
    {
        return $this->hasMany('App\UserGumball', 'user_id')
            ->join('gumballs', 'gumballs.id', 'user_gumballs.gumball_id')
            ->where('gumballs.faction_id', '=', $faction);
    }

    /**
     * Get the fates associated with the user.
     *
     * @return HasMany
     */
    public function fates()
    {
        return $this->hasMany('App\UserFate', 'user_id')
            ->join('fates', 'fates.id', 'user_fates.user_id');
    }

    /**
     * Get the groups fates associated with the user.
     *
     * @param integer $group
     *
     * @return HasMany
     */
    public function groupFates($group)
    {
        return $this->hasMany('App\UserFate', 'user_id')
            ->join('fates', 'fates.id', 'user_fates.fate_id')
            ->where('fates.group_id', '=', $group);
    }

    /**
     * Has the user got the associated gumballs?
     *
     * @param Collection|array $gumballs
     *
     * @return HasMany
     */
    public function hasGumballs($gumballs)
    {
        if ($gumballs instanceof Collection) {
            $count = $gumballs->count();
        } else {
            $count = count($gumballs);
        }

        return $count > 0 && $this->hasMany('App\UserGumball', 'user_id')
            ->join('gumballs', 'gumballs.id', 'user_gumballs.gumball_id')
            ->whereIn('gumballs.id', $gumballs)
            ->count() === $count;
    }
}
