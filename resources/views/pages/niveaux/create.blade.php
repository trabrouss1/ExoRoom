@extends('layouts.base')
@section('sidebar')
@endsection
@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mt-5 page-title">Ajouter un niveau</h1>
            </div>
        </div>
    </div>
        {!! Toastr::message() !!}
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('niveau.store') }}" method="POST" >
                @csrf
                <div class="row formtype">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Libellé</label>
                            <input class="form-control" value='{{ old('libelle') }}' name="libelle" type="text" placeholder="Saississez le libelle du niveau" autocomplete="" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Série</label>
                            <input class="form-control" value='{{ old('serie') }}' name="serie" type="text" placeholder="Saississez la serie du niveau" autocomplete="">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Enregister</button>
            </form>
        </div>
    </div>
</div>
@endsection
