<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\InterestedResource;
use App\Http\Services\InterestedService;
use Illuminate\Http\Response;
use App\Exceptions\Handler;

class InterestedController extends Controller
{
    protected $interestedService;

    public function __construct(
        InterestedService $interestedService

    ){
        $this->interestedService = $interestedService;
    }
    public function index()
    {
        try {
            $getInterested = $this->interestedService->getInterestedList();
            return InterestedResource::collection($getInterested);
        }
        catch (Exception $e) {
            $data = ["message" => "Dados nao encontrados", "error" => $e->getMessage()];
            return response()->json($data, 200);
        }
    }

    public function store(Request $request) // Obs de melhorias: Criar uma request somente para cake
    {
        return InterestedResource::make($this->interestedService->createInterested($request));
    }

    public function show(int $id)
    {
        try {
            return InterestedResource::make($this->interestedService->getInterestedById($id));
        }
        catch (Exception $e) {
            $data = ["message" => "Dado nao encontrado", "error" => $e->getMessage()];
            return response()->json($data, 200);
        }
    }

    public function update(Request $request, int $id)
    {
        return $this->interestedService->updateInterested($request, $id);
    }

    public function destroy(int $id): void
    {
        $this->interestedService->deleteInterested($id);
    }
}
