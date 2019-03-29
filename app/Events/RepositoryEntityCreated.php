<?php

namespace App\Events;

/**
 * Class RepositoryEntityCreated.
 */
class RepositoryEntityCreated extends RepositoryEventBase
{
    /**
     * @var string
     */
    protected $action = 'created';
}
