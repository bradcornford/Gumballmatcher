<?php

namespace App\Http\Controllers;

use App\Alliance;
use App\Fate;
use App\Gumball;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AllianceController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application alliances.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('alliance-index')) {
            return abort(401);
        }

        $alliances = Alliance::all()
            ->load('users');
        $user = Auth::user();
        $alliance = $user->alliance;
        $gumballs = Gumball::all();
        $fates = Fate::all();
        $allianceGumballs = $alliance->gumballs()->get();
        $allianceFates = $alliance->fates()->get();

        return view('alliance.index', compact('alliances', 'user', 'alliance', 'gumballs', 'fates', 'allianceGumballs', 'allianceFates'));
    }
}
