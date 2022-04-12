@extends('layouts.base')

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="mt-5 page-title">Modification de la commune <strong>{{ $commune->libelle }} </strong></h1>
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
                                <label>Libellé</label>
                                <input class="form-control" name="libelleModifier" value="{{ $commune->libelle }}" type="text"
                                    placeholder="Saississez le libelle de la commune" autocomplete="">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary buttonedit1">Modifier</button>
                </form>
            </div>
        </div>
@endsection
