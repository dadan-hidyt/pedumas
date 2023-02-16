<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LaporanService;
use App\Repository\LaporanRepository;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
class LaporanController extends Controller
{
    public function index(){
        $title = "Laporan - ";
        $masyarakat = Masyarakat::get();
        return view('petugas.laporan',compact('title'));
    }
    public function generate(Request $request,LaporanService $LaporanService,LaporanRepository $laporanRepository){
        $start = $request->start_date;
        $end = $request->end_date;
        $start = $request->start_date;
        $with_tanggapan = $request->with_tanggapan;
        $masyarakat = $request->masyarakat;
        //get data by end and start data
       $pengaduan = Pengaduan::when([$start,$end], function($query,$date){
            return $query->whereBetween('tgl_pengaduan',$date);
       })->when($masyarakat,function($query,$masyarakat){
            return $query->where(['nik'=>$masyarakat]);
       });
       
        dd($pengaduan->get()->toArray());

            //query builder with repository
        // if ($request->type_output == 'table') {
        //     $LaporanService->generateTable();
        // }
    }
}
