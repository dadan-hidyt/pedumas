<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\{
    Pengaduan,
};
class DashboardController extends Controller
{
    public function count(){
        $nik = Auth::guard('masyarakat')->user()->nik;
        return array(
            'semua_pengaduan' => Pengaduan::where('nik',$nik)->count(),
            'proses' => Pengaduan::where('nik',$nik)->where('status','proses')->count(),
            'selesai' => Pengaduan::where('nik',$nik)->where('status','selesai')->count(),
        );
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $title = "Dashboard Masyarakat";
        $count = $this->count();
        return view('masyarakat.dashboard',compact('title','count'));
    }
}
