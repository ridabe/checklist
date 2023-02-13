<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        try {
            $getCake = $this->cakeService->getCakeList();
            return CakeResource::collection($getCake);
        }
        catch (Exception $e) {
            $data = ["message" => "Dados nao encontrados", "error" => $e->getMessage()];
            return response()->json($data, 200);
        }

    }

    public function store(Request $request) // Obs de melhorias: Criar uma request somente para cake
    {
        return CakeResource::make($this->cakeService->createCake($request));
    }

    public function show(int $id)
    {
        try {
            $response = $this->cakeService->getCakeById($id);
            return CakeResource::make($response);
        }
        catch (Exception $e) {
            $data = ["message" => "Dado nao encontrado", "error" => $e->getMessage()];
            return response()->json($data, 200);
        }

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
