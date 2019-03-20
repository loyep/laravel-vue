<?php

namespace App\Traits;

use App\Services\CachedBuilder;

trait Cachable
{
    protected $isCachable = true;

    public function isCachable(): bool
    {
        return $this->isCachable;
    }

    /**
     * Get a new query builder instance for the connection.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    protected function newBaseQueryBuilder()
    {
        if (!$this->isCachable()) {
            $this->isCachable = true;

            return $this->getConnection()->query();
        }

        $conn = $this->getConnection();
        $grammar = $conn->getQueryGrammar();
        $builder = new CachedBuilder($conn, $grammar, $conn->getPostProcessor());
//        if (isset($this->rememberFor)) {
//            $builder->remember($this->rememberFor);
//        }
//        if (isset($this->rememberCacheTag)) {
//            $builder->cacheTags($this->rememberCacheTag);
//        }
//        if (isset($this->rememberCachePrefix)) {
//            $builder->prefix($this->rememberCachePrefix);
//        }
//        if (isset($this->rememberCacheDriver)) {
//            $builder->cacheDriver($this->rememberCacheDriver);
//        }
        return $builder;
    }
}
