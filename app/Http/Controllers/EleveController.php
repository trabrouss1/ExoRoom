<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use App\Models\Commune;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class EleveController extends Controller
{
    public function index(Request $request)
    {
        $niveaux = Niveau::where('isDeleted', false)->get();
        $communes = Commune::where('isDeleted', false)->get();

        if($request->isMethod('post')){
            $nom             = $request->nom;
            $prenom          = $request->prenom;
            $communeId       = $request->commune_id;
            $niveauId        = $request->niveau_id;
            $date_naissance  = $request->date_naissance;
            $lieu_naissance  = $request->lieu_naissance;
            $lieu_habitation = $request->lieu_habitation;

            if($nom == null || $prenom == null || $communeId == null || $niveauId == null || $date_naissance == null || $lieu_habitation == null || $lieu_naissance == null ){
                Toastr::error('Remplissez convenablement les champs', 'Erreur');
                return redirect()->back();
            }

            $etudiant                  = new Etudiant;
            $etudiant->nom             = $nom;
            $etudiant->prenom          = $prenom;
            $etudiant->commune_id      = $communeId;
            $etudiant->created_at      = (new \DateTime(now()))->format('d/m/Y');
            $etudiant->niveau_id       = $niveauId;
            $etudiant->date_naissance  = $date_naissance;
            $etudiant->lieu_naissance  = $lieu_naissance;
            $etudiant->lieu_habitation = $lieu_habitation;
            $etudiant->save();
            Toastr::success("L'élève <strong> $nom $prenom </strong> a été inscrit(e) avec succès.");
            return to_route('listeEleve');
        }
        return view('pages.eleves.index', compact('niveaux', 'communes'));
    }

    public function liste()
    {
        // Affiche la liste des etudiants donc le champs isDeleted est egale a false ou a 0
        $etudiants = Etudiant::where('isDeleted', false)->get();
        return view('pages.eleves.liste', compact('etudiants'));
    }
}
