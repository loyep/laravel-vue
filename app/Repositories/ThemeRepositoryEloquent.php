<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ThemeRepository;
use App\Entities\Theme;
use App\Validators\ThemeValidator;

/**
 * Class ThemeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ThemeRepositoryEloquent extends BaseRepository implements ThemeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Theme::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ThemeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
