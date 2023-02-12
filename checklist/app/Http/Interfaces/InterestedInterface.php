<?php

namespace app\Http\Interfaces;

interface InterestedInterface
{
    public function getInterestedList();

    public function getInterestedById(int $id);

    public function createInterested($data);

    public function updateInterested($data, int $id);

    public function deleteInterested(int $id);

}
