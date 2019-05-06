<?php

namespace App\Http\Requests;

/**
 * Class UserRequest.
 */
class UserRequest extends Request
{

    /**
     * @return array
     */
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
