<?php

namespace App\Http\Controllers;

use App\Models\Fichier;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $files = Fichier::all();
        return view('admin.index', compact('files'));
    }
}
