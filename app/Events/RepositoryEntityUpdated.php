<?php

namespace App\Events;

/**
 * Class RepositoryEntityUpdated.
 */
class RepositoryEntityUpdated extends RepositoryEventBase
{
    /**
     * @var string
     */
    protected $action = 'updated';
}
