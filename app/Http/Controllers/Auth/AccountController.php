<?php

namespace App\Http\Controllers\Auth;

use App\Alliance;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeDetailsRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Change details form
     *
     * @return \Illuminate\View\View
     */
    public function showChangeDetailsForm()
    {
        $user = Auth::getUser()
            ->load('alliance');
        $alliances = Alliance::get()
            ->pluck('name', 'id')
            ->prepend('Please select', '');

        return view('auth.account.change_details', compact('user', 'alliances'));
    }

    /**
     * Change details.
     *
     * @param ChangeDetailsRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeDetails(ChangeDetailsRequest $request)
    {
        $user = User::find(Auth::getUser()->id);

        if (!$user->update($request->all())) {
            return redirect()->back()->withError(trans('auth.failed'));
        }

        return redirect()->back()->withStatus(trans('app.account.change_details.statuses.patch'));
    }

    /**
     * Change password form
     *
     * @return \Illuminate\View\View
     */
    public function showChangePasswordForm()
    {
        $user = Auth::getUser();

        return view('auth.account.change_password', compact('user'));
    }

    /**
     * Change password.
     *
     * @param ChangePasswordRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $user = User::find(Auth::getUser()->id);

        if (!Hash::check($request->get('current_password'), $user->password)) {
            return redirect()->back()->withError(trans('passwords.failed'));
        }

        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return redirect()->back()->withStatus(trans('app.account.change_password.statuses.patch'));
    }
}
