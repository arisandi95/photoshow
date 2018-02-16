<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    public function index(){
        $albums = Album::with('photos')->get();
    	return view('albums.index')->with('albums', $albums);
    }

    public function create(){
    	return view('albums.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'name' => 'required',
    		'cover_image' => 'image|max:1999'
    	]);
        //mengambil nama dan ekstensi file 
    	$filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        //mengambil nama file
    	$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //mengambil ekstensi file
    	$extension = $request->file('cover_image')->getClientOriginalExtension();
        //buat nama file baru
    	$filenameToStore = $filename.'_'.time().'.'.$extension;

    	//Upload Image
    	$path = $request->file('cover_image')->storeAs('public/album_covers' , $filenameToStore);	

        //create album
        $album  = new Album;
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $filenameToStore;

        $album->save();

        return redirect('/albums')->with('success','Album Created');


    }

    public function show($id){
        $album = Album::with('photos')->find($id);
        return view('albums.show')->with('album', $album);
    }

}
