<?php

namespace App\Http\Livewire\Petugas;

use Livewire\Component;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;

class EditMasyarakat extends Component
{
    public $masyarakat;
    public $oldUsername;
    public $passwordUpdate;
    public $rules = array(
        'masyarakat.username' => 'alpha_num',
    );
    public $validationAttributes = array(
        'masyarakat.username' => 'Username'
    );
    public function mount($masyarakat){
        $this->oldUsername = $masyarakat['username'];
    }
    public function update(){
        $this->validate();
        if (Masyarakat::whereUsername($this->masyarakat['username'])->count() === 0 || $this->masyarakat['username'] == $this->oldUsername) {
           if(Masyarakat::where('nik',$this->masyarakat['nik'])->update($this->masyarakat)){
                $this->dispatchBrowserEvent('masyarakat_berhasil_di_update');
           }
        } else{
            session()->flash('username_duplikat',"Username sudah ada yang mengunakan!");
        }
    }
    public function updatePassword(){
        $this->validate([
            'passwordUpdate.password' => 'required|confirmed',
        ]);
        $password = Hash::make($this->passwordUpdate['password']);
        $updated = Masyarakat::find($this->masyarakat['nik'])->update(['password'=>$password]);
        if($updated){
            $this->passwordUpdate = [];
            $this->dispatchBrowserEvent('password_berahsil_di_update');
        }
    }
    public function render()
    {
        return view('livewire.petugas.edit-masyarakat');
    }
}
