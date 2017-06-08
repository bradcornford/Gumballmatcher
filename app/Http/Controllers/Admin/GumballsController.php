<?php

namespace App\Http\Controllers\Admin;

use App\Faction;
use App\Gumball;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGumballsRequest;
use App\Http\Requests\Admin\UpdateGumballsRequest;

class GumballsController extends Controller
{
    /**
     * Display a listing of gumball.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('admin-gumball-index')) {
            return abort(401);
        }

        $gumballs = Gumball::all();

        return view('admin.gumballs.index', compact('gumballs'));
    }

    /**
     * Show the form for creating new gumball.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('admin-gumball-create')) {
            return abort(401);
        }

        $factions = Faction::get()
            ->pluck('name', 'id')
            ->prepend('Please select', '');

        return view('admin.gumballs.create', compact('factions'));
    }

    /**
     * Store a newly created Gumball in storage.
     *
     * @param \App\Http\Requests\Admin\StoreGumballsRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGumballsRequest $request)
    {
        if (!Gate::allows('admin-gumball-create')) {
            return abort(401);
        }

        $gumball = Gumball::onlyTrashed()
            ->where('key', '=', $request->input('key'));

        if ($gumball->count()) {
            $gumball->restore();
        }

        Gumball::updateOrCreate($request->only('key'), $request->all());

        return redirect()->route('admin.gumballs.index');
    }


    /**
     * Show the form for editing Gumball.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('admin-gumball-edit')) {
            return abort(401);
        }

        $gumball = Gumball::findOrFail($id);
        $factions = Faction::get()
            ->pluck('name', 'id')
            ->prepend('Please select', '');

        return view('admin.gumballs.edit', compact('gumball', 'factions'));
    }

    /**
     * Update Gumball in storage.
     *
     * @param \App\Http\Requests\Admin\UpdateGumballsRequest $request
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGumballsRequest $request, $id)
    {
        if (!Gate::allows('admin-gumball-edit')) {
            return abort(401);
        }

        $gumball = Gumball::findOrFail($id);
        $gumball->update($request->all());

        return redirect()->route('admin.gumballs.index');
    }

    /**
     * Display Gumball.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('admin-gumball-view')) {
            return abort(401);
        }

        $gumball = Gumball::findOrFail($id);

        return view('admin.gumballs.show', compact('gumball'));
    }


    /**
     * Remove Gumball from storage.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('admin-gumball-delete')) {
            return abort(401);
        }

        $gumball = Gumball::findOrFail($id);
        $gumball->delete();

        return redirect()->route('admin.gumballs.index');
    }

    /**
     * Delete all selected Gumball at once.
     *
     * @param Request $request
     *
     * @return void
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('admin-gumball-delete')) {
            return abort(401);
        }

        foreach (Gumball::whereIn('id', $request->input('ids', []))->get() as $entry) {
            $entry->delete();
        }
    }
}
