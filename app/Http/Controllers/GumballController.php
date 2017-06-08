<?php

namespace App\Http\Controllers;

use App\Faction;
use App\Gumball;
use App\Http\Requests\StoreGumballRequest;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class GumballController extends Controller
{
    use RedirectsUsers;

    /**
     * Where to redirect users after gumball.
     *
     * @var string
     */
    protected $redirectTo = '/gumballs';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application gumballs form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (!Gate::allows('gumball-index')) {
            return abort(401);
        }

        $gumballs = Gumball::all();
        $factions = Faction::all()
            ->load('gumballs');
        $user = Auth::user()
            ->load('gumballs');

        return view('gumball.index', compact('gumballs', 'factions', 'user'));
    }

    /**
     * Handle a gumball request for the application.
     *
     * @param \App\Http\Requests\StoreGumballRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreGumballRequest $request)
    {
        if (!Gate::allows('gumball-store', $request->input('user_id'))) {
            return abort(401);
        }

        $user = Auth::user();
        $user->gumballs()->detach();
        $user->gumballs()->attach($request->input('gumballs', []));

        return redirect()->route('gumball.index')->withStatus(trans('app.gumball.statuses.store'));
    }
}
