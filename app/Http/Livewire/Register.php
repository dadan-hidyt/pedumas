<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Masyarakat;

class Register extends Component
{
    protected $rules = [
        'user.nama' => 'required',
        'user.nik' => 'required|max:16|min:16',
        'user.password' => 'required',
        'user.username' => 'required',
    ];
    protected $validationAttributes = [
        'user.nama' => 'Nama',
        'user.nik' => 'Nik',
        'user.password' => 'Password',
        'user.username' => 'Username',
    ];

    public $user;
    /**
     * Proses daftar
     */
    public function daftar()
    {
        $this->validate();
        $checkUsername = Masyarakat::find($this->user['username']);
        $checkNik = Masyarakat::find($this->user['nik']);
        if (!$checkUsername && !$checkNik) {
            $this->user['password'] = password_hash($this->user['password'], PASSWORD_DEFAULT);
            Masyarakat::insert($this->user);
            $this->user = [];
            session()->flash('success_daftar', 'Pendaftaran berhasil silahkan login!');
            return redirect()->intended('login');
        } else {
            return session()->flash('gagal', "Sepertinya nik atau username sudah ada yang mengunakan");
        }
    }
    public function render()
    {
        return view('livewire.register');
    }
}
