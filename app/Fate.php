<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Fate extends Model
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
        'group_id',
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
     * Get the group the fate belongs to.
     *
     * @return belongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
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
