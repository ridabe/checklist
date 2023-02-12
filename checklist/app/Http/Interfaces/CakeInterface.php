<?php

namespace app\Http\Interfaces;

interface CakeInterface
{
    public function getCakeList();

    public function getCakeById(int $id);

    public function createCake($data);

    public function updateCake($data, int $id);

    public function deleteCake(int $id);
}
