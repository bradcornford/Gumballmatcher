<?php

namespace App\Http\Controllers\Admin;

use App\Faction;
use App\Gumball;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFactionsRequest;
use App\Http\Requests\Admin\UpdateFactionsRequest;

class FactionsController extends Controller
{
    /**
     * Display a listing of faction.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('admin-faction-index')) {
            return abort(401);
        }

        $factions = Faction::all();

        return view('admin.factions.index', compact('factions'));
    }

    /**
     * Show the form for creating new faction.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('admin-faction-create')) {
            return abort(401);
        }

        return view('admin.factions.create');
    }

    /**
     * Store a newly created Faction in storage.
     *
     * @param \App\Http\Requests\Admin\StoreFactionsRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFactionsRequest $request)
    {
        if (!Gate::allows('admin-faction-create')) {
            return abort(401);
        }

        $faction = Faction::onlyTrashed()
            ->where('key', '=', $request->input('key'));

        if ($faction->count()) {
            $faction->restore();
        }

        Faction::updateOrCreate($request->only('key'), $request->all());

        return redirect()->route('admin.factions.index');
    }


    /**
     * Show the form for editing Faction.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('admin-faction-edit')) {
            return abort(401);
        }

        $faction = Faction::findOrFail($id);

        return view('admin.factions.edit', compact('faction'));
    }

    /**
     * Update Faction in storage.
     *
     * @param \App\Http\Requests\Admin\UpdateFactionsRequest $request
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFactionsRequest $request, $id)
    {
        if (!Gate::allows('admin-faction-edit')) {
            return abort(401);
        }

        $faction = Faction::findOrFail($id);
        $faction->update($request->all());

        return redirect()->route('admin.factions.index');
    }

    /**
     * Display Faction.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('admin-faction-view')) {
            return abort(401);
        }

        $faction = Faction::findOrFail($id);
        $gumballs = Gumball::where('faction_id', $faction->id)->get();

        return view('admin.factions.show', compact('faction', 'gumballs'));
    }


    /**
     * Remove Faction from storage.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('admin-faction-delete')) {
            return abort(401);
        }

        $faction = Faction::findOrFail($id);
        $faction->delete();

        return redirect()->route('admin.factions.index');
    }

    /**
     * Delete all selected Faction at once.
     *
     * @param Request $request
     *
     * @return void
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('admin-faction-delete')) {
            return abort(401);
        }

        foreach (Faction::whereIn('id', $request->input('ids', []))->get() as $entry) {
            $entry->delete();
        }
    }
}
