<?php

namespace App\Traits;

/**
 * Class TransformableTrait
 * @package Prettus\Repository\Traits
 */
trait TransformableTrait
{

    /**
     * @return array
     */
    public function transform()
    {
        return $this->toArray();
    }
}
