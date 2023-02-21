<?php 
namespace App\Services;
use App\Repository\LaporanRepository;
use App\Models\Pengaduan;
use PDF;
use Illuminate\Http\Request;

class LaporanService{
	public $laporanRepository;
	public function __construct(){
		$this->laporanRepository = new LaporanRepository();
		$this->pengaduan = new Pengaduan();
	}
	public function reportByMasyarakat(){

	}
	public function reportAllByDate(){
		$pengaduan = Pengaduan::when([request()->start_date,request()->end_date], function($query,$date){
            return $query->whereBetween('tgl_pengaduan',$date);
        })->withCount('tanggapan');
		//genereate view pdf file
		$pdf = PDF::loadView('laporan.pdf.report_by_date', ['data'=>$pengaduan->get()]);
		return $pdf;
	}
	public function reportAll(){
		$pengaduan = Pengaduan::all()->withCount('tanggapan');
		return $pengaduan;
	}
}

 ?>