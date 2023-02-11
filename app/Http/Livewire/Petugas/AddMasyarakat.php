<?php

namespace App\Http\Livewire\Petugas;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\Masyarakat;
class AddMasyarakat extends Component
{
    public $masyarakat;
    public $rules = array(
        'masyarakat.username' => 'required|min:6|max:120',
        'masyarakat.nik' => 'required|min:16|max:16',
        'masyarakat.nama' => 'required|max:60',
        'masyarakat.password' => 'required',
    );
    public function cekNik($nik){
        if ($count = Masyarakat::find($this->masyarakat['nik'])) {
            return $count->count() >=1;
        }
        return false;
    }
    public function tambah(){
        $this->validate();
        $username = Masyarakat::whereUsername($this->masyarakat['username'])->count() >=1;
        if ($this->cekNik($this->masyarakat['nik'])) {
           session()->flash('nik_duplikat', "Nik sudah ada yang mengunakan!");
        } elseif($username){
           session()->flash('username_duplikat', "Username sudah ada yang mengunakan!");
        }else{
            $this->masyarakat['password'] = Hash::make($this->masyarakat['password']);
           if (Masyarakat::create($this->masyarakat)) {
              $this->masyarakat = [];
              return redirect()->route('petugas.manage-masyarakat.index');
           }
        }

    }
    public function render()
    {
        return view('livewire.petugas.add-masyarakat');
    }
}
