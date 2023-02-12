<?php

namespace app\Http\Repositories;

use App\Http\Interfaces\CakeInterface;
use App\Models\Cake;

class CakeRepository implements CakeInterface
{
    protected $model;

    public function __construct(Cake $model)
    {
        $this->model = $model;
    }

    public function getCakeList()
    {
        return $this->model->get();
    }

    public function getCakeById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function createCake($data)
    {
        return $this->model->create($data->all());
    }

    public function updateCake($data, int $id)
    {
        return $this->model->findOrFail($id)->update($data->all());
    }

    public function deleteCake(int $id)
    {
        return $this->model->findOrFail($id)->delete();
    }
}
