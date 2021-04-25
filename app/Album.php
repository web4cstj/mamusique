<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'auteur',
        'titre',
        'md5',
        'annee',
        'image',
    ];
    public function adresseImage($size=250) {
        return asset('images/albums/'.$this->md5.'_'.$size.'.jpg');
    }
}
