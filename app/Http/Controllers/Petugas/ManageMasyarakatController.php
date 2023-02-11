<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Masyarakat;

class ManageMasyarakatController extends Controller
{
    public function index(){
        $masyarakat = Masyarakat::withCount('pengaduan')->with('pengaduan')->get();
        $title = "Manage Masyarakat";
        return view('petugas.manage_masyarakat',compact('masyarakat','title'));
    }
    public function edit(Request $request,$nik){
        $masyarakat = Masyarakat::find($nik)->toArray();
        $title = "Edit Masyarakat";
        return view('petugas.edit_mayarakat',compact('masyarakat','title'));
    }
    public function add(){
        $title = "Tambah Petugas";
        return view('petugas.tambah_masyarakat',compact('title'));
    }
    public function delete(Request $request,$nik){
        $finder = Masyarakat::findOrFail($nik);
        if($finder->delete($nik)){
           return back();
        }else{
            return back();
        }
    }
}
