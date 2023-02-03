<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Pengaduan;
class DashboardController extends Controller
{
    public function cartData(){
        $month = [];
        $months = '';
        $perbulan = [];
        $pengaduan = Pengaduan::where(DB::raw('YEAR(tgl_pengaduan)'), '=', date('Y') );
        foreach($pengaduan->get()->toArray() as $item){
            $perbulan[abs(date('m',strtotime($item['tgl_pengaduan'])))] = Pengaduan::whereMonth('tgl_pengaduan','=',date('m',strtotime($item['tgl_pengaduan'])))->count();
        }
        $perBulan = [];
        for ($m=1; $m<=12; $m++) {
            $perBulan[$m] = $perbulan[$m] ?? 0;
            $month[] = (new \Carbon\Carbon(date('d-m-y', mktime(0,0,0,$m, 1, date('Y')))))->isoFormat('MMMM');
        }
        foreach ($month as  $value) {
            $months .= sprintf('\'%s\',',$value);
        }
        return [
            'perbulan' => implode(',', $perBulan),
            'bulan' => $months,
        ];
    }
    public function __invoke(){
        $title = "Dashboard Petufas";
        $charts = $this->cartData();
        return view("petugas.dashboard",compact('title','charts'));
    }
}
