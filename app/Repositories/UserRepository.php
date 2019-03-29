<?php

namespace App\Repositories;

use App\Criteria\RequestCriteria;
use App\Models\User;
use App\Validators\UserValidator;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository extends BaseRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Specify Validator class name.
     *
     * @return mixed
     */
    public function validator()
    {
        return UserValidator::class;
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
