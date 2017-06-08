<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Where to redirect users after password is changed.
     *
     * @var string $redirectTo
     */
    protected $redirectTo = '/change_password';

    /**
     * Change password form
     *
     * @return \Illuminate\View\View
     */
    public function showChangePasswordForm()
    {
        $user = Auth::getUser();

        return view('auth.change_password', compact('user'));
    }

    /**
     * Change password.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        $user = Auth::getUser();
        $this->validator($request->all())->validate();

        if (Hash::check($request->get('current-password'), $user->password)) {
            $user->password = bcrypt($request->get('new-password'));
            $user->save();

            return redirect($this->redirectTo)->withStatus(trans('passwords.update'));
        }

        return redirect()->back()->withErrors(trans('passwords.failed'));
    }

    /**
     * Get a validator for an incoming change password request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'current_password' => 'required|string|min:6|max:255',
            'new_password' => 'required|string|min:6|max:255|confirmed',
        ]);
    }
}
