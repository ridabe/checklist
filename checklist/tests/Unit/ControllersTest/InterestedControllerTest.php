<?php

namespace tests\Unit\ControllersTest;

use Tests\TestCase;

use App\Http\Controllers\InterestedController;
use App\Http\Repositories\InterestedRepository;
use App\Http\Services\InterestedService;
use App\Models\Interested;

class InterestedControllerTest extends TestCase
{
    public function testShouldReturnAllInterested()
    {
        $model = new Interested();
        $repository = new InterestedRepository($model);
        $service = new InterestedService($repository);
        $controler = new InterestedController($service);
        $response = $controler->index();
        $this->assertIsObject($response);
    }
}
