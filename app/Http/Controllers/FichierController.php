<?php

namespace App\Http\Controllers;

use App\Models\Fichier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FichierController extends Controller
{
    public function create(){
        return view('admin.create');
    }
    public function store(Request $request){
        // dd($request->file('img'));

        //Storage classique
        // Storage::put('public/img/', $request->file('img'));

        //db
        // $file = new Fichier();
        // $file->img = $request->file('img')->hashName();
        // $file->save();
        // return redirect()->route('home');

        //STORAGE en LIGNE URL
        // récupération du fichier
        $content = file_get_contents($request->img2);

        //rename le fichier, on coupe et recupere ce qu'il y a après le '/'
        $name = substr($request->img2, strrpos($request->img2, '/') +1);

        //DD qui montre chaque étape pour bien comprendre
        // dd($request->img2, $content, substr($request->img2, strrpos($request->img2, '/') +1), substr($request->img2, strrpos($request->img2, '/')), strrpos($request->img2, '/'));

        //Partie STORAGE (1er parametre, on donne le chemin + on donne le nom du fichier. 2eme par c'est le CONTENU du fichier)
        Storage::put('public/img/'.$name , $content);
        //Partie DB
        $file = new Fichier();
        $file->img = $name;
        $file->save();
        return redirect()->route('admin');
    }
    public function destroy(Fichier $id){
        $file = $id;
        // dd($file->img)
        Storage::delete('public/img/' . $file->img);
        $file->delete();
        return redirect()->back();
    }
    public function edit(Fichier $id){
        $file = $id;
        return view('admin.edit', compact('file'));
    }
    public function update(Fichier $id, Request $request){
        $file = $id;

        // storage
        if ($request->file('img') != null) {
            Storage::delete('public/img/', $file->img);
            Storage::put('public/img/', $request->file('img'));

            // db
            $file->img =$request->file('img')->hashName();
            $file->save();
        }
        return redirect()->route('admin');
    }
}
