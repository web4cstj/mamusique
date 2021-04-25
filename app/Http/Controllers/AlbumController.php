<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();
        return view("album.index", ['albums'=>$albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $album = new Album();
        $album->auteur = "test";
        $album->titre = "test";
        $album->annee = "2020";
        $album->md5 = md5(uniqid());
        return view('album.create', ['album'=>$album]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $album = new Album($request->all());
        // return $album;
        if ($request->file('image')) {
            $album->image = 1;
            $this->store_image($request, 250);
            $this->store_image($request, 500);
            $this->store_image($request, 750);
        } else {
            $album->image = 0;
        }
        $album->save();
        return redirect()->action('AlbumController@show', $album);
    }
    public function store_image(Request $request, $size) {
        $image = \Image::make($request->file('image'));
        $image->fit($size, $size, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save(public_path("images/albums/{$request->get('md5')}_{$size}.jpg"), 90);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        return view('album.show', ['album'=>$album]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('album.edit', ['album'=>$album]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $album->fill($request->all());
        if ($request->has("retirer") && !$request->file('image')) {
            unlink(public_path("images/albums/{$request->get('md5')}_250.jpg"));
            unlink(public_path("images/albums/{$request->get('md5')}_500.jpg"));
            unlink(public_path("images/albums/{$request->get('md5')}_750.jpg"));
            $album->image = 0;
        }
        if ($request->file('image')) {
            $album->image = 1;
            $this->store_image($request, 250);
            $this->store_image($request, 500);
            $this->store_image($request, 750);
        }
        $album->save();
        return redirect()->action("AlbumController@show", $album);
    }
    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function delete(Album $album)
    {
        return view('album.delete', ['album'=>$album]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        if ($album->image) {
            unlink(public_path("images/albums/{$album->md5}_250.jpg"));
            unlink(public_path("images/albums/{$album->md5}_500.jpg"));
            unlink(public_path("images/albums/{$album->md5}_750.jpg"));
        }
        $album->delete();
        return redirect()->action('AlbumController@index');
    }
}
