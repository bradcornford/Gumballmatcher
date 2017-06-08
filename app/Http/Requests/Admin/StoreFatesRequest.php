<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreFatesRequest extends FormRequest
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
            'key' => 'required|string|max:255|unique:factions,key,NULL,id,deleted_at,NULL',
            'description' => 'sometimes|max:65535',
            'image' => 'sometimes|max:255',
            'group_id' => 'required|integer|exists:groups,id',
            'gumballs' => 'array',
            'gumballs.*' => 'integer|exists:gumballs,id',
        ];
    }
}
