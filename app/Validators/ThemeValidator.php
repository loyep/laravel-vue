<?php

namespace App\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

/**
 * Class ThemeValidator.
 */
class ThemeValidator extends LaravelValidator
{
    /**
     * Validation Rules.
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
