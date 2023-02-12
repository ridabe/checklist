<?php

namespace app\Http\Interfaces;

interface CakeInterface
{
    public function getCakeList();

    public function getCakeById(int $id);

    public function createCake(array $data);

    public function updateCake(array $data, int $id);

    public function deleteCake(int $id);
}
