<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class NiveauController extends Controller
{
    public function index(Request $request)
    {
        if($request->isMethod('post')){
            $libelleNiveau = $request->libelle;
            $serie         = $request->serie;

            if($libelleNiveau == null)
                Toastr::error('Rensiegner le libelle', 'Libelle non saisser');
                return redirect()->back();

            $niveau = new Niveau;
            $niveau->libelle = $libelleNiveau;
            $niveau->serie = $serie;
            $niveau->created_at =( new \DateTime(now()))->format('d/m/Y');
            $niveau->save();
            $label = isset($serie) ? $serie : '';
            Toastr::success("Le niveau <strong>$libelleNiveau $label</strong> a été enregister avec succès");
            return to_route('listeNiveau');
        }
        return view('pages.niveaux.index');
    }

    public function liste()
    {
        $niveaux = Niveau::where('isDeleted', false)->get();
        return view('pages.niveaux.liste', compact('niveaux'));
    }

    public function modifier(Request $request, Niveau $niveau)
    {
        $niveau = Niveau::find($niveau->id);
        if($request->isMethod('POST')){
            $libelleNiveau      = $request->libelle;
            $serie              = $request->serie;
            $niveau->libelle    = $libelleNiveau;
            $niveau->serie      = $serie;
            $niveau->updated_at = ( new \DateTime(now()))->format('d/m/Y');
            $niveau->save();
            $label = isset($serie) ? $serie : '';
            Toastr::success("Le niveau a <strong>$libelleNiveau $label</strong> été modifier avec succès");
            return to_route('listeNiveau');
        }
        return view('pages.niveaux.modifier', compact('niveau'));
    }

    public function supprimer(Request $request, Niveau $niveau)
    {
        dd($request);
        if($request->isMethod('post')){
            $niveauId = $request->input('SupprimerNiveau');
        }

        // return to_route('listeNiveau');
    }
}