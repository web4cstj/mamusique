<div class="champ champ-md5">
    <label for="md5">Identifiant</label>
    <input type="text" name="md5" id="md5" value="{{$album->md5}}" readonly="readonly">
</div>
<div class="champ champ-auteur">
    <label for="auteur">Auteur</label>
    <input type="text" name="auteur" id="auteur" value="{{$album->auteur}}">
</div>
<div class="champ champ-titre">
    <label for="titre">Titre</label>
    <input type="text" name="titre" id="titre" value="{{$album->titre}}">
</div>
<div class="champ champ-annee">
    <label for="annee">Année</label>
    <input type="number" name="annee" id="annee" min="0" value="{{$album->annee}}">
</div>
<div class="champ champ-image">
    <label for="image">Image</label>
    <input type="file" name="image" id="image">
</div>
@if($album->image)
<div class="retirer">
    <label><input type="checkbox" name="retirer" id="retirer"> Retirer l'image</label>
</div>
@endif
<div class="submit">
    <input type="submit">
</div>