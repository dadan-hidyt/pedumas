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
    public function edit(Request $request,$id = null){
        abort_if($id === null, '404');
        if ($petugas = Petugas::find($id)) {
            $title = "Edit Petugas";
            return view('petugas.edit_petugas',compact('petugas','title'));
        }else{
            return back();
        }
    }
    public function add(){
        $title = "Tambah Petugas";
        return view('petugas.tambah_petugas',compact('title'));
    }
    public function delete(Request $request, $id = null){
        abort_if($id === null,'404');
        if (Petugas::find($id)) {
            Petugas::destroy($id);
            return back();
        }
    }
}
