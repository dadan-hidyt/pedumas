<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Pengaduan;
class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {
     $title = "Semua Pengaduan";
     $pengaduan = Pengaduan::where('nik',Auth::guard('masyarakat')->user()->nik)->withCount(['tanggapan'])->get();
     return view('masyarakat.semua_pengaduan', compact('title','pengaduan'));
 }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {
        $title = "Buat Pengaduan";
        return view('masyarakat.buat_pengaduan', compact('title'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * 
     */
    public function show($id)
    {
        $data = Pengaduan::withCount(['tanggapan'])->with(['tanggapan'])->find($id);
        if ($data->nik == auth()->guard('masyarakat')->user()->nik) {
            $title = "Detail Pengaduan";
            return view('masyarakat.detail_pengaduan',compact('data','title'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * 
     */
    public function edit($id)
    {
        $title = "Edit Pengaduan";
        $pengaduan = Pengaduan::find($id)->toArray();
        return view('masyarakat.edit_pengaduan',compact('title','pengaduan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * 
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * 
     */
    public function destroy($id)
    {
        Pengaduan::findOrFail($id);
        Pengaduan::find($id)->delete($id);
        return redirect()->back()->withErrors(['success'=>"Pengaduan berhasil di hapus!"]);
    }
}
