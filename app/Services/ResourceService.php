<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use PHPUnit\Framework\Exception;

abstract class ResourceService
{
    /**
     * @var Model
     */
    protected $model;

    public function __construct()
    {
        $this->model = app()->make($this->model());
    }

    /**
     * @return Model
     */
    protected function model(): Model
    {
        throw new Exception(
            'No Model expectation found.'
        );
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    abstract public function paginate(Request $request);

    /**
     * @param $id
     *
     * @return mixed
     */
    abstract public function show($id);

    /**
     * Remove the specified resource from storage.
     *
     * @param array|Collection|int $ids
     *
     * @return JsonResponse
     */
    public function destroy($ids)
    {
        if (is_string($ids)) {
            $ids = explode(',', $ids);
        }

        return $this->model->destroy($ids);
    }
}
