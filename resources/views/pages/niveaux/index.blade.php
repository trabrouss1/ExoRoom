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
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $niveau->libelle }}</td>
                                    <td>{{ $niveau->serie }}</td>
                                    <td>
                                        <a class='btn btn-primary' href="{{ route('niveau.show', $niveau) }}" title="Ajouter">
                                            <i class="fas fa-save">
                                            </i>
                                        </a>
                                        <a href="#" class='btn btn-danger supp' title="Supprimer">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                        <input type="hidden" name="deleted_id" class="deleted"
                                            value="{{ $niveau->id }}">
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
    @section('scripts')
        <script type="text/javascript">
            $(document).ready(function(e) {
                e.preventDefault;
                $('.supp').click(function() {
                    var deleted = $(this).closest("tr").find('.deleted').val();
                    var data = {
                        "id": deleted,
                    };
                    var url = "niveau/delete/" + deleted;
                    Swal.fire({
                        icon: 'warning',
                        title: 'Voulez vous vraiment supprimer?',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: "Supprimer",
                        showCancelButton: false,
                        denyButtonText: "Annuler",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                method: "POST",
                                url: url,
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Suppression',
                                        text: 'Le niveau a été supprimée!',
                                    }).then((willDelete) => {
                                        location.reload();
                                    });
                                }
                            });
                        } else if (result.isDenied) {
                            Swal.fire("La suppression a été annulée", '', 'info')
                        }
                    })
                });
            });
        </script>
    @stop
@endsection
