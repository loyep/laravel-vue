<?php

namespace App\Http\Requests;

class UserRequest extends Request
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

    public function createRules()
    {
        return [
            'name'         => 'required|unique:users|string|max:255',
            'email'        => 'required|unique:users|string|email|max:255',
            'password'     => 'required|string|min:8|confirmed',
            'url'          => 'url',
        ];
    }
}
