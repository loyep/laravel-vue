<?php

namespace App\Repositories;

use App\Criteria\RequestCriteria;
use App\Models\Theme;
use App\Validators\ThemeValidator;

class ThemeRepository extends BaseRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return Theme::class;
    }

    /**
     * Specify Validator class name.
     *
     * @return mixed
     */
    public function validator()
    {
        return ThemeValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     *
     * @throws \App\Exceptions\RepositoryException
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
