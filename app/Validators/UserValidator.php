<?php

namespace App\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace App\Validators;
 */
class UserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'email' => 'required|unique:users|string',
            'name' => 'required|unique:users|string',
            'display_name' => 'unique:users|string',
        ],
        ValidatorInterface::RULE_UPDATE => [],
        'login' => [
            'username' => 'required|string',
            'password'        => 'required|string',
        ],
        'register' => [

        ]
    ];
}
