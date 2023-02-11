<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interested;
use App\Http\Resources\InterestedResource;

class InterestedController extends Controller
{
    public function index(Interested $interested)
    {
        $getInterested = $interested->get();    
        return InterestedResource::collection($getInterested);
    }   

    public function store(Request $request) // Obs de melhorias: Criar uma request somente para cake
    {
        
        $request->validate([
            'name' => 'required',
            'cake_id' => 'required',
            'email' => 'required',
            'sent' => 'required',
        ]);
                  

        return InterestedResource::make(Interested::create($request->all()));
        
    }

    public function show($id)
    {
        return Interested::findOrFail($id);
    }   
   
    public function update(Request $request, $id)
    {
        $interested = Interested::findOrFail($id)->update($request->all());

        return $interested;
        
    }
   
    public function destroy($id): void
    {
        Interested::findOrFail($id)->delete();
    }
}
