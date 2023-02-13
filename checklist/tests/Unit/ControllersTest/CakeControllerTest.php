<?php

namespace tests\Unit\ControllersTest;

use App\Http\Controllers\CakeController;
use App\Http\Repositories\CakeRepository;
use App\Http\Services\CakeService;
use App\Models\Cake;
use Tests\TestCase;

class CakeControllerTest extends TestCase
{
    public function testShouldReturnAllCakes()
    {
        $model = new Cake();
        $repository = new CakeRepository($model);
        $service = new CakeService($repository);
        $controler = new CakeController($service);
        $response = $controler->index();
        $this->assertIsObject($response);
    }
}
