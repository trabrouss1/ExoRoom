@extends('layouts.base')

@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mt-5 page-title">Ajouter un élève</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="" method="POST">
                @csrf
                <div class="row formtype">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nom">Nom <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" placeholder="Saisisez le nom" name="nom" id="nom" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="prenom">Prénom <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Saisisez le prenom" name="prenom" id="prenom">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="commune">Commune <span class="text-danger">*</span></label>
                            <select class="form-control" id="commune" name="commune_id">
                                <option>Selectioner la commune</option>
                                @foreach ($communes as $commune)
                                    <option value="{{ $commune->id }}">{{ $commune->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="niveau">Niveau <span class="text-danger">*</span></label>
                            <select class="form-control" id="niveau" name="niveau_id">
                                <option>Selectionner le niveau</option>
                                @foreach ($niveaux as $niveau)
                                    <option value="{{ $niveau->id }}" >{{ $niveau->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date_naissance">Date de naissance <span class="text-danger">*</span></label>
                                <input type="date" name="date_naissance" id="date_naissance" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="lieu_naissance">Lieu de naissance <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Lieu de naissance" name="lieu_naissance" id="lieu_naissance">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="lieu_habitation">Lieu d'habitation <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder=" Lieu d'habitation" name="lieu_habitation" id="lieu_habitation">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="nom_pere">Nom du pere :</label>
                                <input type="text" class="form-control" placeholder="Nom du pere" name="nom_pere" id="nom_pere">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="prenom_pere">Prénom du pere</label>
                                <input type="text" class="form-control"  placeholder="Prenom du pere" name="prenom_pere" id="prenom_pere">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="nom_mere">Nom de la mere :</label>
                                <input type="text" class="form-control" placeholder="Nom de la mere" name="nom_mere" id="nom_mere">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="prenom_mere">Prénom de la mere</label>
                                <input type="text" class="form-control"  placeholder="Prenom de la mere" name="prenom_mere" id="prenom_mere">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Enregister</button>
            </form>
        </div>
    </div>
</div>
@endsection
