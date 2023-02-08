<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Petugas;
class RegisterPetugas extends Component
{
    public $user;
    protected $rules = array(
        'user.nama_petugas' => 'required|string|max:225|min:3',
        'user.username' => 'required|string',
        'user.password' => 'required|min:6|max:150',
        'user.no_telp' => 'required|min:12|max:12',
    );
    protected $validationAttributes = array(
        'user.nama_petugas' => 'Nama Petugas',
        'user.username' => 'Username',
        'user.password' => 'Password',
        'user.no_telp' => 'Nomor Telepon',
    );
    public function daftar(){
        $this->validate();
        //cek pada table petugas ada gak username yang sama
        $checkUsername = Petugas::whereUsername($this->user['username']);
        $usernameAlerdy = false;
        if ($checkUsername && $checkUsername->count() > 0) {
            $usernameAlerdy = true;
        }
        if ($usernameAlerdy === false) {
            $this->user['password'] = password_hash($this->user['password'],PASSWORD_DEFAULT);
            if(Petugas::create($this->user)){
                session()->flash('success_daftar',"Pendaftaran akun petugas berhasil! Silahkan login!");
                return redirect()->to("login");
            }
        }
        return session()->flash('gagal',"Pendaftaran gagal! Kemungkinan username sudah ada yang mengunakan, Jika masih error silahkan hubungi administrator");
    }
    public function render()
    {
        return view('livewire.register-petugas');
    }
}
