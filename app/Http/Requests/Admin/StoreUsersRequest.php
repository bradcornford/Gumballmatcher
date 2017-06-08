<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,NULL,id,deleted_at,NULL',
            'username' => 'string|max:255|unique:users,username,NULL,id,deleted_at,NULL',
            'password' => 'required|string|min:6|max:255|confirmed',
            'alliance_id' => 'integer|exists:alliances,id',
            'role_id' => 'required|integer|exists:roles,id',
        ];
    }
}
