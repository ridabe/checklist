<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interested;
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
        $getInterested = $this->interestedService->getInterestedList();
        return InterestedResource::collection($getInterested);
    }

    public function store(Request $request) // Obs de melhorias: Criar uma request somente para cake
    {
        return InterestedResource::make($this->interestedService->createInterested($request));
    }

    public function show(int $id)
    {
        return InterestedResource::make($this->interestedService->getInterestedById($id));
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
