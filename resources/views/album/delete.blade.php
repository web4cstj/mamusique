@extends('layout.index')
@section('menu')
<li><a href="{{action('AlbumController@index')}}">Liste des albums</a></li>
<li><a href="{{action('AlbumController@show', $album)}}">Voir cet album</a></li>
<li><a href="{{action('AlbumController@edit', $album)}}">Modifier cet album</a></li>
@endsection
@section('contenu')
<h1>Supprimer</h1>
@include('album.carte')
<form action="{{action('AlbumController@destroy', $album)}}" method="post">
{{ csrf_field() }}

<p>Voulez-vous vraiment supprimer cet album?</p>
<div><button type="submit">Supprimer</button> <a href="{{action('AlbumController@show', $album)}}">Annuler</a></div>
</form>
@endsection