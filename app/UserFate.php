<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class UserFate extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fate_id',
        'user_id',
    ];

    /**
     * Get the user for the user fate.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::Class);
    }

    /**
     * Get the fate for the user fate.
     *
     * @return HasOne
     */
    public function fate()
    {
        return $this->hasOne(Fate::class);
    }
}
