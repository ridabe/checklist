<?php

namespace App\Http\Services;

use App\Http\Interfaces\CakeInterface;

class CakeService
{
    protected $interface;

    public function __construct(CakeInterface $interface)
    {
        $this->interface = $interface;
    }
    public function getCakeList()
    {
        return $this->interface->getCakeList();
    }

    public function getCakeById(int $id)
    {
        return $this->interface->getCakeById($id);
    }

    public function createCake($data)
    {
        $data->validate([
            'name' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'amount' => 'required',
        ]);
        return $this->interface->createCake($data);
    }

    public function updateCake($data, int $id)
    {
        $data->validate([
            'name' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'amount' => 'required',
        ]);
        return $this->interface->updateCake($data, $id);
    }

    public function deleteCake(int $id)
    {
        return $this->interface->deleteCake($id);
    }
}
