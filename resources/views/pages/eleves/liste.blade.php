@extends('layouts.base')


@section('content')
    <div class="mt-5 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Liste des élèves</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Commune</th>
                                <th>Niveau</th>
                                <th>DateNaissance</th>
                                <th>LieuNaissance</th>
                                <th>LieuHabitation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @php($i = 1)
                        @foreach ($etudiants as $etudiant)
                        <tbody>
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $etudiant->nom }}</td>
                                <td>{{ $etudiant->prenom }}</td>
                                <td>{{ $etudiant->commune->libelle }}</td>
                                <td>{{ $etudiant->niveau->libelle }}</td>
                                <td>{{ $etudiant->date_naissance }}</td>
                                <td>{{ $etudiant->lieu_naissance }}</td>
                                <td>{{ $etudiant->lieu_habitation }}</td>
                                <td>
                                    <a href="{{ route('eleveAjoute') }}" title="Ajouter"><i class="fas fa-save"></i></a>
                                    <a href="" title="Modifier"><i class="fas fa-edit"></i></a>
                                    <a href="#" title="Supprimer"> <i style="color:red;" class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
