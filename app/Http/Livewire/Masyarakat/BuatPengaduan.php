<?php

namespace App\Http\Livewire\Masyarakat;

use Livewire\Component;
use Livewire\WithFileUploads;
use Auth;
use App\Models\Pengaduan;
class BuatPengaduan extends Component
{
    use WithFileUploads;
    public $pengaduan_data;
    public $pengaduan_poto;
    protected $rules = array(
        'pengaduan_poto' => 'image|required|max:1024',
        'pengaduan_data.judul_pengaduan' => 'required',
        'pengaduan_data.isi_laporan' => 'required',
        'pengaduan_data.tgl_pengaduan' => 'required',
    );
    public function simpan(){
        $this->validate();
       $this->pengaduan_data['foto'] = 'foto_pengaduan/'.Auth::guard()->user()->username."/".$this->pengaduan_poto->getClientOriginalName();
       if(Pengaduan::insert($this->pengaduan_data)){
        $this->pengaduan_poto->storeAs('public',$this->pengaduan_data['foto']);
        return session()->flash('success',"Pengaduan berhasil di buat!");
    }
    return session()->flash('gagal',"Pengaduan gagal di kirim!");
}
public function render()
{
    $this->pengaduan_data['nik'] = Auth::guard('masyarakat')->user()->nik;
    return view('livewire.masyarakat.buat-pengaduan',['data'=>$this->pengaduan_data]);
}
}
