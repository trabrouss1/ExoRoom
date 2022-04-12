@extends('layouts.base')


@section('content')
    <div class="mt-5 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Liste des communes</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Libelle</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @php($i = 1)
                        @foreach ($communes as $commune)
                            <tbody>
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $commune->libelle }}</td>
                                    <td>
                                        <a href="{{ route('ajouterCommune') }}" title="Ajouter"><i class="fas fa-save"></i></a>
                                        <a href="{{ route('modifierCommune', ['commune'=>$commune]) }}" title="Modifier"><i class="fas fa-edit"></i></a>
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
