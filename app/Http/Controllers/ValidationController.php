<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller {
   //Page dans la route 'welcome.blade.php'
   /*public function index()
    {
        $etudiant = Etudiant::latest()->paginate();
        $long=20;
        $larg=15;
        $rowNumber = 1;     
        return view('index', compact("long","larg","etudiant","rowNumber"));
    }*/
    public function showform() {
       return view('login');
    }
    public function validateform(Request $request) {
       print_r($request->all());
       $this->validate($request,[
          'username'=>'required|max:8',
          'password'=>'required'
       ]);
    }
 }