<?php

namespace App\Contracts;

/**
 * Interface PresenterInterface.
 */
interface PresenterInterface
{
    /**
     * Prepare data to present.
     *
     * @param $data
     *
     * @return mixed
     */
    public function present($data);
}
