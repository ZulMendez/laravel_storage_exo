@extends('layouts.index')

@section('content')
    <div class="text-center">
        <h1>DashBoard | back office | partie Admin</h1>
        <a href="{{ route('file.create') }}" class="btn btn-success">ajouter un fichier</a>
        <a href="{{ route('home') }}" class="btn btn-primary">Retour sur le site</a>
    </div>

    <div class="row my-5 py-5">
        @foreach ($files as $file)
            <div class="col-4">
                @if (Str::after($file->img, '.') == 'jpg' || Str::after($file->img, '.') == 'png')
                    <p>Image</p>
                    <img width="50%" src="{{ asset('storage/img/' . $file->img) }}" alt="">
                @else
                    <p>non image</p>
                    <p class="text-danger">{{$file->img}}</p>
                @endif
                <form method="post" action="{{route('file.destroy', $file->id)}}">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger">DELETE</button>
                </form>
                <a class="btn btn-success" href="{{route('file.edit', $file->id)}}">EDIT</a>
            </div>
        @endforeach
    </div>
@endsection