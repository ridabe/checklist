<?php

namespace app\Http\Repositories;

use app\Http\Interfaces\InterestedInterface;
use App\Models\Interested;

class InterestedRepository implements InterestedInterface
{
    protected $model;

    public function __construct(Interested $model)
    {
        $this->model = $model;
    }

    public function getInterestedList()
    {
        return $this->model->get();
    }

    public function getInterestedById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function createInterested($data)
    {
        return $this->model->create($data->all());
    }

    public function updateInterested($data, int $id)
    {
        return $this->model->findOrFail($id)->update($data->all());
    }

    public function deleteInterested(int $id)
    {
        return $this->model->findOrFail($id)->delete();
    }
}
