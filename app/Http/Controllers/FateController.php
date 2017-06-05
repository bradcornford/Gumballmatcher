<?php

namespace App\Http\Controllers;

use App\Alliance;
use App\Faction;
use App\Fate;
use App\Group;
use App\Http\Requests\StoreFateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class FateController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application fates.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (!Gate::allows('fate-index')) {
            return abort(401);
        }

        $groups = Group::all()
            ->load('fates', 'fates.gumballs');
        $fates = Fate::all();
        $user = Auth::user()
            ->load('fates');
        $alliance = $user->alliance()
            ->first();

        return view('fate.index', compact('fates', 'groups', 'user', 'alliance'));
    }

    /**
     * Handle a fate request for the application.
     *
     * @param \App\Http\Requests\StoreFateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreFateRequest $request)
    {
        if (!Gate::allows('fate-store', $request->input('user_id'))) {
            return abort(401);
        }

        $this->validator($request->all())->validate();

        $user = Auth::user();
        $user->fates()->detach();
        $user->fates()->attach($request->input('fates', []));

        return redirect()->route('fate')->withStatus(trans('fate.store.success'));
    }
}
