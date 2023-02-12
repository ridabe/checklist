<?php

namespace App\Http\Services;

use App\Models\Cake;

class CakeService
{
    protected $cakeModel;

    public function __construct(Cake $cake)
    {
        $this->cakeModel = $cake;
    }
    public function getCakeList()
    {        
        $getCake = $this->cakeModel->get();        
        return $getCake;
    }

}