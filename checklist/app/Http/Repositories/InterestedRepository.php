<?php

namespace app\Http\Repositories;

use App\Http\Interfaces\InterestedInterface;
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
        return $this->model->get()->sortBy('sent');
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

    public function deleteInterested(int $id): void
    {
        $this->model->findOrFail($id)->delete();
    }
}
