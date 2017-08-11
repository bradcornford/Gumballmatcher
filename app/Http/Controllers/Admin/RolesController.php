<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;

class RolesController extends Controller
{
    /**
     * Display a listing of role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('admin-role-index')) {
            return abort(401);
        }

        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating new role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('admin-role-create')) {
            return abort(401);
        }

        return view('admin.roles.create');
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param \App\Http\Requests\Admin\StoreRolesRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolesRequest $request)
    {
        if (!Gate::allows('admin-role-create')) {
            return abort(401);
        }

        $role = Role::onlyTrashed()
            ->where('key', '=', $request->input('key'));

        if ($role->count()) {
            $role->restore();
        }

        Role::updateOrCreate($request->only('key'), $request->all());

        return redirect()->route('admin.roles.index');
    }


    /**
     * Show the form for editing Role.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);

        if (!Gate::allows('admin-role-edit', $role)) {
            return abort(401);
        }

        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update Role in storage.
     *
     * @param \App\Http\Requests\Admin\UpdateRolesRequest $request
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolesRequest $request, $id)
    {
        $role = Role::findOrFail($id);

        if (!Gate::allows('admin-role-edit', $role)) {
            return abort(401);
        }
        $role->update($request->all());

        return redirect()->route('admin.roles.index');
    }

    /**
     * Display Role.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        if (!Gate::allows('admin-role-view', $role)) {
            return abort(401);
        }

        $users = User::where('role_id', $id)->get();

        return view('admin.roles.show', compact('role', 'users'));
    }


    /**
     * Remove Role from storage.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        if (!Gate::allows('admin-role-delete', $role)) {
            return abort(401);
        }

        $role->delete();

        return redirect()->route('admin.roles.index');
    }

    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     *
     * @return void
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('admin-role-mass-delete')) {
            return abort(401);
        }

        foreach (Role::whereIn('id', $request->input('ids', []))->get() as $entry) {
            $entry->delete();
        }
    }
}
