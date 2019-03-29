<?php
namespace App\Contracts;

/**
 * Interface Transformable
 * @package Prettus\Repository\Contracts
 */
interface Transformable
{
    /**
     * @return array
     */
    public function transform();
}
