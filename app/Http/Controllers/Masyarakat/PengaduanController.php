<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
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
     $pengaduan = \App\Models\Pengaduan::where('nik',Auth::guard('masyarakat')->user()->nik)->get();
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * 
     */
    public function show($id)
    {
        $data = \App\Models\Pengaduan::find($id);
        if ($data->nik == \Auth::guard('masyarakat')->user()->nik) {
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
        //
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
        //
    }
}
