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

        //Storage
        Storage::put('public/img/', $request->file('img'));

        //db
        $file = new Fichier();
        $file->img = $request->file('img')->hashName();
        $file->save();
        return redirect()->route('home');
    }
    public function destroy(Fichier $id){
        $file = $id;
        // dd($file->img)
        Storage::delete('public/img/' . $file->img);
        $file->delete();
        return redirect()->back();
    }
}
