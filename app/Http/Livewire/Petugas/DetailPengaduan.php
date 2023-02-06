<?php

namespace App\Http\Livewire\Petugas;

use Livewire\Component;
use App\Models\Tanggapan;
class DetailPengaduan extends Component
{
    public $data;
    public $isi_tanggapan;
    public function simpan_tanggapan(){
       $this->validate([
        'isi_tanggapan' => 'required',
    ]);
       $Tanggapan = new Tanggapan();
       $Tanggapan->id_pengaduan = $this->data->id;
       $Tanggapan->id_petugas = auth()->guard('petugas')->user()->id;
       $Tanggapan->tanggapan = $this->isi_tanggapan;
       $Tanggapan->tanggal_tanggapan = date("Y-m-d");
       if ($Tanggapan->save()) {
           session()->flash('success', "Tanggapan berhasil di kirim!");
           $this->dispatchBrowserEvent('successfuly');
           return true;
       }
       session()->flash('gagal', "Tanggapan gagal di kirim!");
   }
   public function render()
   {
    return view('livewire.petugas.detail-pengaduan');
}
}
