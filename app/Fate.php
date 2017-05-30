<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        return $this->belongsTo('App\FateGroup');
    }

    /**
     * Get the gumball associated with the fate.
     *
     * @return HasMany
     */
    public function gumballs()
    {
        return $this->hasMany('App\FateGumball', 'fate_id')
            ->join('gumballs', 'gumballs.id', 'fate_gumballs.gumball_id');
    }

    /**
     * Get the user fate associated with the fate.
     *
     * @param  integer  $user
     *
     * @return HasOne
     */
    public function userFate($user)
    {
        return UserFate::where('user_fates.user_id', '=', $user)
            ->where('user_fates.fate_id', '=', $this->id);
    }
}
