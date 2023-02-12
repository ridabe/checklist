<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cake;
use App\Http\Resources\CakeResource;
use App\Http\Services\CakeService;

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
        
        $request->validate([
            'name' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'amount' => 'required',
        ]);
                  
        
        return CakeResource::make(Cake::create($request->all()));
        
    }

    public function show($id)
    {
        return Cake::findOrFail($id);
    }   
   
    public function update(Request $request, $id)
    {
        $cake = Cake::findOrFail($id)->update($request->all());

        return $cake;
        
    }
   
    public function destroy($id): void
    {
        Cake::findOrFail($id)->delete();
    }
}
