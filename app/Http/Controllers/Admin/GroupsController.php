<?php

namespace App\Http\Controllers\Admin;

use App\Fate;
use App\Group;
use App\Gumball;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGroupsRequest;
use App\Http\Requests\Admin\UpdateGroupsRequest;

class GroupsController extends Controller
{
    /**
     * Display a listing of group.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('admin-group-index')) {
            return abort(401);
        }

        $groups = Group::all();

        return view('admin.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating new group.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('admin-group-create')) {
            return abort(401);
        }

        return view('admin.groups.create');
    }

    /**
     * Store a newly created Group in storage.
     *
     * @param \App\Http\Requests\Admin\StoreGroupsRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupsRequest $request)
    {
        if (!Gate::allows('admin-group-create')) {
            return abort(401);
        }

        $group = Group::onlyTrashed()
            ->where('key', '=', $request->input('key'));

        if ($group->count()) {
            $group->restore();
        }

        Group::updateOrCreate($request->only('key'), $request->all());

        return redirect()->route('admin.groups.index');
    }


    /**
     * Show the form for editing Group.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('admin-group-edit')) {
            return abort(401);
        }

        $group = Group::findOrFail($id);

        return view('admin.groups.edit', compact('group'));
    }

    /**
     * Update Group in storage.
     *
     * @param \App\Http\Requests\Admin\UpdateGroupsRequest $request
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupsRequest $request, $id)
    {
        if (!Gate::allows('admin-group-edit')) {
            return abort(401);
        }

        $group = Group::findOrFail($id);
        $group->update($request->all());

        return redirect()->route('admin.groups.index');
    }

    /**
     * Display Group.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('admin-group-view')) {
            return abort(401);
        }

        $group = Group::findOrFail($id);
        $fates = Fate::where('group_id', $group->id)->get();

        return view('admin.groups.show', compact('group', 'fates'));
    }


    /**
     * Remove Group from storage.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('admin-group-delete')) {
            return abort(401);
        }

        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('admin.groups.index');
    }

    /**
     * Delete all selected Group at once.
     *
     * @param Request $request
     *
     * @return void
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('admin-group-delete')) {
            return abort(401);
        }

        foreach (Group::whereIn('id', $request->input('ids', []))->get() as $entry) {
            $entry->delete();
        }
    }
}
