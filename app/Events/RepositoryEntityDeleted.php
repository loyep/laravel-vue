<?php

namespace App\Events;

/**
 * Class RepositoryEntityDeleted
 * @package Prettus\Repository\Events
 */
class RepositoryEntityDeleted extends RepositoryEventBase
{
    /**
     * @var string
     */
    protected $action = "deleted";
}
