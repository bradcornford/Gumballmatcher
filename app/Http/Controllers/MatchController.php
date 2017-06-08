<?php

namespace App\Http\Controllers;

use App\Alliance;
use App\Faction;
use App\Fate;
use App\Group;
use App\UserFate;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class MatchController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application matches.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('match-index')) {
            return abort(401);
        }

        $groups = Group::all()
            ->load('fates', 'fates.gumballs');
        $fates = Fate::all()
            ->load('gumballs');
        $user = Auth::user()
            ->load('gumballs', 'fates');
        $alliance = $user->alliance()
            ->with('users')
            ->first();

        return view('match.index', compact('groups', 'fates', 'user', 'alliance'));
    }
}
