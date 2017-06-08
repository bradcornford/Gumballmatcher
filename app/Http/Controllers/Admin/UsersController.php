<?php

namespace App\Http\Controllers\Admin;

use App\Alliance;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('admin-user-index')) {
            return abort(401);
        }

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('admin-user-create')) {
            return abort(401);
        }

        $roles = Role::get()
            ->pluck('name', 'id')
            ->prepend('Please select', '');
        $alliances = Alliance::get()
            ->pluck('name', 'id')
            ->prepend('Please select', '');

        return view('admin.users.create', compact('roles', 'alliances'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param \App\Http\Requests\Admin\StoreUsersRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        if (!Gate::allows('admin-user-create')) {
            return abort(401);
        }

        $user = User::onlyTrashed()
            ->where('email', '=', $request->input('email'))
            ->orWhere('username', '=', $request->input('username'));

        if ($user->count()) {
            $user->restore();
        }

        User::updateOrCreate($request->only(['email', 'username']), $request->all());

        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('admin-user-edit')) {
            return abort(401);
        }

        $roles = Role::get()
            ->pluck('name', 'id')
            ->prepend('Please select', '');
        $alliances = Alliance::get()
            ->pluck('name', 'id')
            ->prepend('Please select', '');

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'roles', 'alliances'));
    }

    /**
     * Update User in storage.
     *
     * @param \App\Http\Requests\Admin\UpdateUsersRequest $request
     * @param integer $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        if (! Gate::allows('admin-user-edit')) {
            return abort(401);
        }
        
        User::findOrFail($id)->update($request->all());

        return redirect()->route('admin.users.index');
    }


    /**
     * Display User.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('admin-user-view')) {
            return abort(401);
        }

        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }


    /**
     * Remove User from storage.
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('admin-user-delete')) {
            return abort(401);
        }

        User::findOrFail($id)->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('admin-user-delete')) {
            return abort(401);
        }
        
        if ($request->input('ids')) {
            foreach (User::whereIn('id', $request->input('ids'))->get() as $entry) {
                $entry->delete();
            }
        }
    }
}
