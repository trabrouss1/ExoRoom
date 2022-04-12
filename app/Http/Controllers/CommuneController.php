<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CommuneController extends Controller
{
    public function index()
    {
        $communes = Commune::where('isDeleted', false)->get();
        return view('pages.communes.index', compact('communes'));
    }

    public function ajouter(Request $request)
    {
        if($request->isMethod('post')){
            $libelleCommune = $request->libelleCommune;

            if($libelleCommune == null){
                Toastr::error('Remplissez convenablement le champs', 'Error');
                return redirect()->back();
            }

            $commune = new Commune;
            $commune->libelle = $libelleCommune;
            $commune->created_at = (new \DateTime(now()))->format('d/m/Y');
            $commune->save();
            Toastr::success("La commune  <strong> $libelleCommune </strong> a été ajouter avec succès.", "Succès");
            return to_route('listeCommune');
        }
        return view('pages.communes.ajouter');
    }

    public function modifier(Request $request, Commune $commune)
    {
        $commune = Commune::find($commune->id);
        if($request->isMethod('post')){
            $communeModifier = $request->libelleModifier;

            $commune->libelle = $communeModifier;
            $commune->updated_at = (new \DateTime(now()))->format('d/m/Y');
            $commune->save();
            Toastr::success("La commune <strong> $communeModifier </strong> a été modifier avec succes.");
            return to_route('listeCommune');
        }
        return view('pages.communes.modifier', compact('commune'));
    }
}