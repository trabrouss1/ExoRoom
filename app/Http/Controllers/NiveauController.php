<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Brian2694\Toastr\Facades\Toastr;

class NiveauController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     **/
    public function index()
    {
        $niveaux = Niveau::orderByDesc('created_at')->get();
        return view('pages.niveaux.index', compact('niveaux'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     **/

    public function create(){
        return view('pages.niveaux.create');
    }


    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     **/

    public function store(Request $request){

        $request->validate([
            'libelle' => ['required', Rule::unique('niveaux', 'libelle'), 'max:255'],
            'serie' => ['nullable', 'string','max:255'],
        ]);

        Niveau::create($request->except('_token'));
        Toastr::success('Niveau créé avec succès', 'Succès');
        
        return redirect()->route('niveau.index');
    }

    public function update(Request $request, Niveau $niveau)
    {
        $niveau->update($request->all());
        return view('pages.niveaux.modifier', compact('niveau'));
    }

    public function delete(Request $request, Niveau $niveau)
    {
        $niveau->delete();
        Toastr::success("Le niveau <strong>$niveau->libelle</strong> a été supprimer avec succès");
        return view('pages.niveaux.index');
    }
}
