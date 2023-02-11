<?php

namespace App\Http\Livewire\Masyarakat;

use Livewire\Component;
use Livewire\WithFileUploads;
use Auth;
use App\Models\Pengaduan;
class EditPengaduan extends Component
{
    use WithFileUploads;
    public $pengaduan;
    public $pengaduan_poto;
    protected $rules = array(
        'pengaduan.judul_pengaduan' => 'string',
        'pengaduan.isi_laporan' => 'string',
        'pengaduan.tgl_pengaduan' => 'string',
    );
    public function mount($pengaduan){
        $this->pengaduan = $pengaduan;
    }
    public function simpan(){
        $this->validate();
        $this->pengaduan['tgl_pengaduan'] = \Carbon\Carbon::now();
        $this->pengaduan['foto'] = $this->pengaduan_poto ?
        'foto_pengaduan/'.Auth::guard()->user()->username."/".$this->pengaduan_poto->getClientOriginalName() 
        : $this->pengaduan['foto'];
        $id = $this->pengaduan['id'];
        if (cariKataDilarang(text:$this->pengaduan['isi_laporan'],dataset:config('sensor_kata')) >= 3) {
            return session()->flash('gagal',"Isi pengaduan anda mengandung kata kata kotor! Silahkan gunakan kata2 yang sopan.");
        }
        if(Pengaduan::find($id)->update($this->pengaduan)){
         if ($this->pengaduan_poto) {
            $this->pengaduan_poto->storeAs('public',$this->pengaduan['foto']);
        }
        return redirect()->route('masyarakat.pengaduan.index');
    }
}
public function render()
{
    return view('livewire.masyarakat.edit-pengaduan',['data'=>$this->pengaduan]);
}
}
