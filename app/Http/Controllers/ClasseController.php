<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classe::orderBy('id', 'desc')->get();
        $rowNumber = 1;     
        return view('classes.index', compact("classes","rowNumber"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:classes|max:100',
        ], [
            'name.unique' => 'Cette donnée existe déjà.', 
        ]);
  
        Classe::create($request->all());   
        return redirect()->route('classes.index')->with('success','enregistrement reussi avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classe $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classe $classe, $id)
    {
        $classe = Classe::find($id);
        return view('classes.edit',compact('classe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classe $classe, $id)
    {
        $classe = Classe::find($id);
        $request->validate([
            'name' => 'required',
        ]);
        
        $classe->fill($request->post())->save();

        return redirect()->route('classes.index')->with('success','donnée modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classe $classe)
    {
        $classe->delete();
        return redirect()->route('classes.index')->with('success','suppression reussie');
    }
}
