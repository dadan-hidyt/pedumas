<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
class KelolaPengaduanController extends Controller
{
    public function index(){
        $title = "Kelola Pengaduan";
        $pengaduan = Pengaduan::all();
        return view('petugas.kelola_pengaduan',compact('title','pengaduan'));
    }
    public function show(Request $request,$id){
        $pengaduan = Pengaduan::find($id);
        $title = "Detail pengaduan";
        return view('petugas.detail_pengaduan',compact('pengaduan','title'));
    }
    public function selesai(Request $request,$id){
        Pengaduan::findOrFail($id);
        if (Pengaduan::where('id',$id)->update(['status'=>'selesai'])) {
         return redirect()->back()->with('success',"Pengaduan berhasil di ubah status nya!");
     }
 } 
 public function deleteTanggapan(Request $request,$id,$idTanggapan){
    if (Tanggapan::whereidPengaduan($id)->whereId($idTanggapan)->delete()) {
        return redirect()->back()->with('success',"Tanggapan berhasil di hapus!");
 }
}
public function prosess(Request $request,$id){
    Pengaduan::findOrFail($id);
    if (Pengaduan::where('id',$id)->update(['status'=>'proses'])) {
     return redirect()->back()->with('success',"Pengaduan berhasil di ubah status nya!");
 }
}
}
