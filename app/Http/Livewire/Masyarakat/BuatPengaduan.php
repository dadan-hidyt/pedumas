<?php

namespace App\Http\Livewire\Masyarakat;

use Livewire\Component;
use Livewire\WithFileUploads;
use Auth;
use App\Models\Pengaduan;
class BuatPengaduan extends Component
{
    use WithFileUploads;
    public $pengaduan;
    public $pengaduan_poto;
    protected $rules = array(
        'pengaduan_poto' => 'image|required|max:1024',
        'pengaduan.judul_pengaduan' => 'required',
        'pengaduan.isi_laporan' => 'required',
        'pengaduan.tgl_pengaduan' => 'required',
    );
    public function simpan(){
        $this->validate();
       $this->pengaduan['foto'] = 'foto_pengaduan/'.Auth::guard()->user()->username."/".$this->pengaduan_poto->getClientOriginalName();
       if(Pengaduan::insert($this->pengaduan)){
        $this->pengaduan_poto->storeAs('public',$this->pengaduan['foto']);
        return redirect()->route('masyarakat.dashboard');
    }
    return session()->flash('gagal',"Pengaduan gagal di kirim!");
}
public function render()
{
    $this->pengaduan['nik'] = Auth::guard('masyarakat')->user()->nik;
    return view('livewire.masyarakat.buat-pengaduan',['data'=>$this->pengaduan]);
}
}
