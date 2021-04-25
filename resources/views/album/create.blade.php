@extends('layout.index')
@section('menu')
<li><a href="{{action('AlbumController@index')}}">Liste des albums</a></li>
@endsection
@section('contenu')
<form action="{{action('AlbumController@store')}}" enctype="multipart/form-data" method="post">
{{ csrf_field() }}
@include('album.form')
</form>
@endsection