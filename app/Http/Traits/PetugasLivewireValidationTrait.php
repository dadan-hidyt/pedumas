<?php
namespace App\Http\Traits;
use App\Models\Petugas;
trait PetugasLivewireValidationTrait{
    public $petugas;
    protected $rules = array(
        'petugas.nama_petugas' => 'required|string|max:225|min:3',
        'petugas.username' => 'required|string',
        'petugas.password' => 'required|min:6|max:150',
        'petugas.no_telp' => 'required|min:12|max:12',
    );
    protected $validationAttributes = array(
        'petugas.nama_petugas' => 'Nama Petugas',
        'petugas.username' => 'Username',
        'petugas.password' => 'Password',
        'petugas.no_telp' => 'Nomor Telepon',
    );
    public function checkUsername(string $username) : bool{
        return Petugas::whereUsername($username)->count() >= 1;
    }
    public function checkNoHp(string $noHp){
        return Petugas::where('no_telp',$noHp)->count() >= 1;
    }
}