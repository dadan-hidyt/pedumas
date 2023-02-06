<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Petugas;
class PetugasController extends Controller
{
    public $petugas;
    public function __construct(){
        $this->petugas = new Petugas();
    }
    public function index(){
        $title = "Manage Petugas";
        $petugas = $this->petugas->all();
        return view('petugas.manage_petugas', compact('title','petugas'));
    }
}
