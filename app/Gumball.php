<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Gumball extends Model
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
        'description',
        'image',
    ];

    /**
     * Get the user associated with the gumball.
     *
     * @param integer $user
     *
     * @return HasOne
     */
    public function user($user)
    {
        return User::join('user_gumballs', 'users.id', 'user_gumballs.user_id')
            ->join('gumballs', 'user_gumballs.gumball_id', 'gumballs.id')
            ->where('users.id', '=', $user)
            ->where('gumballs.id', '=', $this->id);
    }

    /**
     * Get the user gumball associated with the gumball.
     *
     * @param integer $user
     *
     * @return HasOne
     */
    public function userGumball($user)
    {
        return UserGumball::where('user_gumballs.user_id', '=', $user)
            ->where('user_gumballs.gumball_id', '=', $this->id);
    }
}
