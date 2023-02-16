<?php 
namespace App\Services;
use App\Repository\LaporanRepository;
class LaporanService{
	public $laporanRepository;
	public function __construct(){
		$this->laporanRepository = new LaporanRepository();
	}
	public function generateTable($data){

	}
	public function genreateSinggle($data){}
}

 ?>