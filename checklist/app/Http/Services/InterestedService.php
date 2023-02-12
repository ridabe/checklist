<?php

namespace app\Http\Services;

use App\Http\Interfaces\InterestedInterface;

class InterestedService
{
    protected $interface;

    public function __construct(InterestedInterface $interface)
    {
        $this->interface = $interface;
    }

    public function getInterestedList()
    {
        return $this->interface->getInterestedList();
    }

    public function getInterestedById(int $id)
    {
        return $this->interface->getInterestedById($id);
    }

    public function createInterested($data)
    {
        $data->validate([
            'name' => 'required',
            'cake_id' => 'required',
            'email' => 'required',
            'sent' => 'required',
        ]);
        return $this->interface->createInterested($data);
    }

    public function updateInterested($data, int $id)
    {
        $data->validate([
            'name' => 'required',
            'cake_id' => 'required',
            'email' => 'required',
            'sent' => 'required',
        ]);
        return $this->interface->updateInterested($data, $id);
    }

    public function deleteInterested(int $id)
    {
        return $this->interface->deleteInterested($id);
    }

}
