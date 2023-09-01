<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Classe;

use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /*public function index()
    {
        $etudiant = Etudiant::latest()->paginate();
        $long=20;
        $larg=15;
        $rowNumber = 1;     
        return view('index', compact("long","larg","etudiant","rowNumber"));
    }*/
    public function index()
    {
        $etudiant = Etudiant::orderBy('id', 'desc')->get();
        $classes = Classe::all(); 
        $rowNumber = 1;    
        return view('etudiants.index', compact("classes","etudiant","rowNumber"));
    }
    public function create()
    {
        $classes = Classe::all(); 
        return view('etudiants.create', compact('classes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'fname' => 'required',
            'tel' => 'required|unique:etudiants|max:20',
            'date' => 'required',
            'classe_id' => 'required',
        ],[
            'tel.unique' => 'Cette donnée existe déjà.', 
        ]);
  
            $etudiants = new Etudiant();
            $etudiants->setAttribute('name', $request->name);
            $etudiants->setAttribute('fname', $request->fname);
            $etudiants->setAttribute('tel', $request->tel);
            $etudiants->setAttribute('date', $request->date);
            $etudiants->setAttribute('classe_id', $request->classe_id);
            $etudiants->save();   
        return redirect()->route('etudiants.index')->with('success','enregistrement reussi avec succès');
    }
    public function show(Etudiant $etudiant) {
        $etudiant=Etudiant::all();
        return view("show", compact("etudiant"));
    }
    public function edit(Etudiant $etudiant)
    {
        $classes = Classe::all(); 
        return view('etudiants.edit',compact('etudiant', 'classes'));
    }
    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'name' => 'required',
            'fname' => 'required',
            'tel' => 'required|unique:etudiants|max:20',
            'date' => 'required',
            'classe_id' => 'required',
        ],[
            'tel.unique' => 'Cette donnée existe déjà.', 
        ]);
        
        $etudiant->fill($request->post())->save();

        return redirect()->route('etudiants.index')->with('success','donnée modifiée');
    }
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('etudiants.index')->with('success','suppression reussie');
    }
    
}
