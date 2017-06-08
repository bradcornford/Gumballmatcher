<?php

namespace App\Http\Controllers\Admin;

use App\Alliance;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAlliancesRequest;
use App\Http\Requests\Admin\UpdateAlliancesRequest;

class AlliancesController extends Controller
{
    /**
     * Display a listing of alliance.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('admin-alliance-index')) {
            return abort(401);
        }

        $alliances = Alliance::all();

        return view('admin.alliances.index', compact('alliances'));
    }

    /**
     * Show the form for creating new alliance.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('admin-alliance-create')) {
            return abort(401);
        }

        return view('admin.alliances.create');
    }

    /**
     * Store a newly created Alliance in storage.
     *
     * @param \App\Http\Requests\Admin\StoreAlliancesRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlliancesRequest $request)
    {
        if (!Gate::allows('admin-alliance-create')) {
            return abort(401);
        }

        $alliance = Alliance::onlyTrashed()
            ->where('key', '=', $request->input('key'));

        if ($alliance->count()) {
            $alliance->restore();
        }

        Alliance::updateOrCreate($request->only('key'), $request->all());

        return redirect()->route('admin.alliances.index');
    }


    /**
     * Show the form for editing Alliance.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('admin-alliance-edit')) {
            return abort(401);
        }

        $alliance = Alliance::findOrFail($id);

        return view('admin.alliances.edit', compact('alliance'));
    }

    /**
     * Update Alliance in storage.
     *
     * @param \App\Http\Requests\Admin\UpdateAlliancesRequest $request
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlliancesRequest $request, $id)
    {
        if (!Gate::allows('admin-alliance-edit')) {
            return abort(401);
        }

        $alliance = Alliance::findOrFail($id);
        $alliance->update($request->all());

        return redirect()->route('admin.alliances.index');
    }

    /**
     * Display Alliance.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('admin-alliance-view')) {
            return abort(401);
        }

        $alliance = Alliance::findOrFail($id);
        $users = User::where('alliance_id', $id)->get();

        return view('admin.alliances.show', compact('alliance', 'users'));
    }


    /**
     * Remove Alliance from storage.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('admin-alliance-delete')) {
            return abort(401);
        }

        $alliance = Alliance::findOrFail($id);
        $alliance->delete();

        return redirect()->route('admin.alliances.index');
    }

    /**
     * Delete all selected Alliance at once.
     *
     * @param Request $request
     *
     * @return void
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('admin-alliance-delete')) {
            return abort(401);
        }

        foreach (Alliance::whereIn('id', $request->input('ids', []))->get() as $entry) {
            $entry->delete();
        }
    }
}
