<a href="{{action('AlbumController@show', $album)}}" class="carte">
    <div class="image">
        <img src="{{$album->adresseImage(250)}}" alt="">    
    </div>
    <div class="auteur">
    {{$album->auteur}}
    </div>
    <div class="titre">
    {{$album->titre}}
    </div>
</a>