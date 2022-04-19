@extends('layouts.base')

@section('content')
    <div class="mt-5 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Liste des niveaux</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Libelle</th>
                                <th>Série</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @forelse ($niveaux as $niveau)
                            <tbody>
                                <tr>
                                    <td>{{ $niveau->loop() }}</td>
                                    <td>{{ $niveau->libelle }}</td>
                                    <td>{{ $niveau->serie }}</td>
                                    <td>
                                        <a href="{{ route('niveau.create') }}" title="Ajouter"> 
                                            <i
                                                class="fas fa-save">
                                            </i> 
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        @empty
                            <tbody>
                                <tr>
                                    <td colspan="4">Aucun niveau</td>
                                </tr>
                            </tbody>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function supprimerNiveau(niveauId) {
            var niveau = $("#SupprimerNiveau").val(niveauId);
        }
    </script>
@stop
