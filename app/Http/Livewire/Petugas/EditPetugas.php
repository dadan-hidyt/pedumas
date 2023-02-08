<?php

namespace App\Http\Livewire\Petugas;

use Livewire\Component;

class EditPetugas extends Component
{
    public $petugas;
    public $dataPetugas;
    public $role = ['admin','petugas'];
    public $password_setting;
    protected $rules = array(
        'password_setting.password' => 'required|min:6|max:225|confirmed',
    );
    protected $validationAttributes = array(
        'password_setting.password' => 'Password',
        'password_setting.password_confirmation' => 'Ulangi Password',
    );
    public function updatePetugas(){
        $this->petugas->nama_petugas = $this->dataPetugas['nama_petugas'];
        $this->petugas->no_telp = $this->dataPetugas['no_telp'];
        $this->petugas->username = $this->dataPetugas['username'];
        $this->petugas->level = $this->dataPetugas['level'];
        if ($this->petugas->save()) {
            $this->dispatchBrowserEvent("petugas_hasben_changed");
        }
    }
    public function updatePassword(){
     $this->validate();
     $this->petugas['password'] = password_hash($this->password_setting['password'],PASSWORD_DEFAULT);
     if ($this->petugas->save()) {
        $this->dispatchBrowserEvent("password_hasben_changed");
    }
}
public function render()
{
    $this->dataPetugas = $this->petugas->toArray();
    return view('livewire.petugas.edit-petugas');
}
}
