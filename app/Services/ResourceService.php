<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use PHPUnit\Framework\Exception;

class ResourceService extends BaseService
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

    public function paginate()
    {

    }

    /**
     * @param $id
     * @return Model
     */
    public function show($id): Model
    {
        return $this->model->findOrFail($id);
    }

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
