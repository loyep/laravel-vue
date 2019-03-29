<?php

namespace App\Services;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;

abstract class ServiceAbstract implements Arrayable
{
    /**
     * @var Request
     */
    private $request;

    /**
     * ServiceAbstract constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return mixed
     */
    abstract public function handle();

    public function toArray()
    {

    }

}
