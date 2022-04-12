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
                    @php($i = 1)
                    @foreach ($niveaux as $niveau)
                        <tbody>
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $niveau->libelle }}</td>
                                <td>{{ $niveau->serie }}</td>
                                <td>
                                    <a href="{{ route('ajouterNiveau') }}" title="Ajouter"> <i class="fas fa-save"></i> </a>
                                    <a href="{{ route('modifierNiveau', ['niveau' =>$niveau]) }}" title="Modifier"><i class="fas fa-edit"></i></a>
                                    <a href="#" title="Supprimer" onclick="supprimerNiveau({{$niveau->id}})" data-toggle="modal" data-target="#supprimer_niveau"> <i style="color:red;" class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
        </div>
    </div>
</div>

<div class="modal custom-modal fade" id="supprimer_niveau" role="dialog">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="text-center modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h2>Suppression</h2>
                    <h4>Vous êtes sur de supprimé <strong> {{ $niveau->libelle }}  </strong> ?</h4>
                </div>
                <div class="modal-btn delete-action">
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" name="niveauId" class="btn btn-primary btn-md">Supprimer</button>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal"
                                    class="btn btn-primary btn-md">Annuler</a>
                            </div>
                        </div>
                        <input type="hidden" name="SupprimerNiveau" id="SupprimerNiveau" value="">
                        <input type="hidden" name="mode" value="delete">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        function supprimerNiveau(niveauId){
            var niveau = $("#SupprimerNiveau").val(niveauId);
        }
    </script>
@stop
