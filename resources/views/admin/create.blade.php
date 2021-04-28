@extends('layouts.index')

@section('content')
    <form  action="{{ route('file.store') }}" method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center my-5">
        @csrf
        <h1 class="text-center">Ajout d'un nouveau fichier</h1>
        <div class="form-group">
            <label for="img">Votre fichier :</label>
            <input type="file" class="form-control-file" id="img" name="img">
        </div>
        <button type="submit" class="btn btn-success text-left">Envoyer</button>
    </form>
@endsection