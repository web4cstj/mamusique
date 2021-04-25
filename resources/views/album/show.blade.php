@extends('layout.index')

@section('menu')
<li><a href="{{action('AlbumController@index')}}">Liste des albums</a></li>
<li><a href="{{action('AlbumController@edit', $album)}}">Modifier cet album</a></li>
<li><a href="{{action('AlbumController@delete', $album)}}">Supprimer cet album</a></li>
@endsection

@section('contenu')
<article>
    @if($album->image)
    <img src="{{$album->adresseImage(500)}}" alt="" style="display:block; width:100%;">
    @else
    <img src="{{asset('images/sans_image.svg')}}" alt="" style="display:block; width:100%;">
    @endif
    <div class="auteur">{{$album->auteur}}</div>
    <div class="titre">{{$album->titre}}</div>
    <div class="annee">{{$album->annee}}</div>
</article>
@endsection