@extends('layouts.base')

@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mt-5 page-title">Modification du niveau <strong>{{ $niveau->libelle }} {{ isset($niveau->serie) ? $niveau->serie : '' }}</strong></h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('niveau.update', $niveau) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row formtype">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Libellé</label>
                            <input class="form-control" name="libelle" value="{{ $niveau->libelle }}" type="text"
                                placeholder="Saississez le libelle du niveau" autocomplete="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Série</label>
                            <input class="form-control" name="serie" value="{{ isset($niveau->serie) ? $niveau->serie : '' }}" type="text" placeholder="Saississez la serie du niveau"
                                autocomplete="">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Enregister</button>
            </form>
        </div>
    </div>
@endsection
