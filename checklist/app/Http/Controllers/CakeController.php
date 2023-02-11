<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cake;

class CakeController extends Controller
{
   
    public function index()
    {
        return Cake::all();
    }   

    public function store(Request $request) // Obs de melhorias: Criar uma request somente para cake
    {
        
        $request->validate([
            'name' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'amount' => 'required',
        ]);
                  

        return Cake::create($request->all());
        
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
