<?php

namespace App\Services;

use Illuminate\Http\Request;

abstract class BaseService
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @param Request $request
     * @return $this
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }
}
