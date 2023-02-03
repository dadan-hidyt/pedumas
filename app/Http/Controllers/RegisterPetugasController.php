<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterPetugasController extends Controller
{
    public function __invoke(){
        $title = "Daftar Petugas";
        return view('register_petugas',compact('title'));
    }
}
