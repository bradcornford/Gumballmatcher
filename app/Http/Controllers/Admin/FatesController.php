<?php

namespace App\Http\Controllers\Admin;

use App\Fate;
use App\Group;
use App\Gumball;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFatesRequest;
use App\Http\Requests\Admin\UpdateFatesRequest;

class FatesController extends Controller
{
    /**
     * Display a listing of fate.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('admin-fate-index')) {
            return abort(401);
        }

        $fates = Fate::all();

        return view('admin.fates.index', compact('fates'));
    }

    /**
     * Show the form for creating new fate.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('admin-fate-create')) {
            return abort(401);
        }

        $groups = Group::get()
            ->pluck('name', 'id')
            ->prepend('Please select', '');
        $gumballs = Gumball::get()
            ->pluck('name', 'id')
            ->prepend('Please select', '');

        return view('admin.fates.create', compact('groups', 'gumballs'));
    }

    /**
     * Store a newly created Fate in storage.
     *
     * @param \App\Http\Requests\Admin\StoreFatesRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFatesRequest $request)
    {
        if (!Gate::allows('admin-fate-create')) {
            return abort(401);
        }

        $fate = Fate::onlyTrashed()
            ->where('key', '=', $request->input('key'));

        if ($fate->count()) {
            $fate->restore();
        }

        $fate = Fate::updateOrCreate($request->only('key'), $request->only(['name', 'key', 'group_id', 'description', 'image']));
        $fate->gumballs()
            ->detach();

        $gumballs = $request->input('gumballs', []);

        if (isset($gumballs[0]) && $gumballs[0] !== null) {
            $fate->gumballs()
                ->attach($gumballs);
        }

        return redirect()->route('admin.fates.index');
    }


    /**
     * Show the form for editing Fate.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('admin-fate-edit')) {
            return abort(401);
        }

        $fate = Fate::findOrFail($id);
        $fateGumballs = $fate->gumballs;
        $groups = Group::get()
            ->pluck('name', 'id')
            ->prepend('Please select', '');
        $gumballs = Gumball::get()
            ->pluck('name', 'id')
            ->prepend('Please select', '');

        return view('admin.fates.edit', compact('fate', 'fateGumballs', 'groups', 'gumballs'));
    }

    /**
     * Update Fate in storage.
     *
     * @param \App\Http\Requests\Admin\UpdateFatesRequest $request
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFatesRequest $request, $id)
    {
        if (!Gate::allows('admin-fate-edit')) {
            return abort(401);
        }

        $fate = Fate::findOrFail($id);
        $fate->update($request->only(['name', 'key', 'group_id', 'description', 'image']));
        $fate->gumballs()
            ->detach();

        $gumballs = $request->input('gumballs', []);

        if (isset($gumballs[0]) && $gumballs[0] !== null) {
            $fate->gumballs()
                ->attach($gumballs);
        }

        return redirect()->route('admin.fates.index');
    }

    /**
     * Display Fate.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('admin-fate-view')) {
            return abort(401);
        }

        $fate = Fate::findOrFail($id);
        $gumballs = $fate->gumballs;

        return view('admin.fates.show', compact('fate', 'gumballs'));
    }


    /**
     * Remove Fate from storage.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('admin-fate-delete')) {
            return abort(401);
        }

        $fate = Fate::findOrFail($id);
        $fate->delete();

        return redirect()->route('admin.fates.index');
    }

    /**
     * Delete all selected Fate at once.
     *
     * @param Request $request
     *
     * @return void
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('admin-fate-delete')) {
            return abort(401);
        }

        foreach (Fate::whereIn('id', $request->input('ids', []))->get() as $entry) {
            $entry->gumballs()->detatch();
            $entry->delete();
        }
    }
}
