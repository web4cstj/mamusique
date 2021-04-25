@extends('layout.index')
@section('menu')
<li><a href="{{action('AlbumController@index')}}">Liste des albums</a></li>
<li><a href="{{action('AlbumController@show', $album)}}">Voir cet album</a></li>
<li><a href="{{action('AlbumController@delete', $album)}}">Supprimer cet album</a></li>
@endsection
@section('contenu')
<form action="{{action('AlbumController@update', $album)}}" enctype="multipart/form-data" method="post">
{{ csrf_field() }}
@include('album.form')
</form>
@endsection