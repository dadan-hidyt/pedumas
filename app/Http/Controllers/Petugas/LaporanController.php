<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LaporanService;
use App\Repository\LaporanRepository;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use PDF;
class LaporanController extends Controller
{
    public function index()   {
        $title = "Buat Laporan ";
        $masyarakat = Masyarakat::get();
        return view('petugas.laporan',compact('title','masyarakat'));
    }
    public function generate(Request $request,LaporanService $LaporanService,LaporanRepository $laporanRepository){
        $start = $request->start_date;
        $end = $request->end_date;
        $start = $request->start_date;
        $masyarakat = $request->masyarakat;
        
        if($masyarakat){
            $pf = $LaporanService->reportByMasyarakat();
        }elseif($start || $end){
            $pf = $LaporanService->reportAllByDate();
        }else{
            $pf = $LaporanService->reportAll();
        }
        return $request->download ? $pf->download(date('dmyhisa').'.pdf') : $pf->stream();
    }
}
