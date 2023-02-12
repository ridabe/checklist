<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cake;
use App\Http\Resources\CakeResource;
use App\Http\Services\CakeService;
use Illuminate\Http\Response;
use App\Exceptions\Handler;


class CakeController extends Controller
{
    protected $cakeResource;
    protected $cakeService;

    public function __construct(
        CakeService $cakeService

    ){
        $this->cakeService = $cakeService;
    }

    public function index()
    {

        $getCake = $this->cakeService->getCakeList();
        return CakeResource::collection($getCake);
    }

    public function store(Request $request) // Obs de melhorias: Criar uma request somente para cake
    {
        return CakeResource::make($this->cakeService->createCake($request));
    }

    public function show(int $id)
    {
        $response = $this->cakeService->getCakeById($id);
        return CakeResource::make($response);
    }

    public function update(Request $request, int $id)
    {
        $cake = $this->cakeService->updateCake($request,$id);

        if ($cake){
            return Response::HTTP_CREATED;
        }

        return Response::HTTP_BAD_REQUEST;

    }

    public function destroy(int $id): void
    {
        $this->cakeService->deleteCake($id);
    }
}
