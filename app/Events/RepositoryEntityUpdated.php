<?php

namespace App\Events;

/**
 * Class RepositoryEntityUpdated
 * @package App\Events
 */
class RepositoryEntityUpdated extends RepositoryEventBase
{
    /**
     * @var string
     */
    protected $action = "updated";
}
