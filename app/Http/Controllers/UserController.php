<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application factions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('user-index')) {
            return abort(401);
        }

        $user = Auth::user();
        $users = User::where('alliance_id', '=', $user->alliance_id)
            ->get()
            ->load('gumballs', 'fates');

        return view('user.index', compact('users', 'user'));
    }
}
