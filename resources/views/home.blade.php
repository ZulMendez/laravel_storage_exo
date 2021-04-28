@extends('layouts.index')

@section('content')
<div class="text-center">
    <h1>Page home | partie client</h1>
    <a href="{{route('admin')}}" class="btn btn-primary">Go BackOffice</a>
</div>

<div class="row my-5">
    @foreach ($files as $file)
    {{-- @dump(Str::after($file->img, '.')) --}}
        @if (Str::after($file->img, '.') == 'jpg' || Str::after($file->img, '.') == 'png')
            <div class="col-4">
                <p><b>Fichier Image</b></p>
                <img width="30%" src="{{ asset('storage/img/' . $file->img) }}" alt="">
                <p>{{$file->img}}</p>
            </div>
            <form method="post" action="{{route('file.destroy', $file->id)}}">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">DELETE</button>
            </form>
        @else
            <div class="col-4">
                <p class="text-danger"><b>Fichier de type non image</b></p>
                <p>{{$file->img}}</p>
            </div>
            <form method="post" action="{{route('file.destroy', $file->id)}}">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">DELETE</button>
            </form>
        @endif
    @endforeach
</div>
@endsection
