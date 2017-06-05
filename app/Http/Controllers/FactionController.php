<?php

namespace App\Http\Controllers;

use App\Faction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class FactionController extends Controller
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
        if (!Gate::allows('faction-index')) {
            return abort(401);
        }

        $factions = Faction::all();
        $user = Auth::user();

        return view('faction.index', compact('factions', 'user'));
    }
}
