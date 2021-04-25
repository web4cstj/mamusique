@extends('layout.index')
@section('menu')
<li><a href="{{action('AlbumController@create')}}">Ajouter un album</a></li>
@endsection
@section('contenu')
<ul class="liste-albums">
    @foreach($albums as $album)
    <li>
        @include('album.carte')
    </li>
    @endforeach
</ul>
@endsection