<?php
namespace App\Http\Livewire;
use App\Models\Petugas;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\PetugasLivewireValidationTrait;
class RegisterPetugas extends Component
{
    use PetugasLivewireValidationTrait;
    public function daftar(){
        $this->validate();
        if ($this->checkUsername($this->petugas['username'])) {
            return session()->flash('gagal',"Pendaftaran gagal! Kemungkinan username sudah ada yang mengunakan, Jika masih error silahkan hubungi administrator");
        }else{
            $this->petugas['password'] = Hash::make($this->petugas['password']);
            if(Petugas::create($this->petugas)){
                $this->petugas = [];
                session()->flash('success_daftar',"Pendaftaran akun petugas berhasil! Silahkan login!");
                return redirect()->to("login");
            } else{
                return session()->flash('gagal',"Pendaftaran gagal!");
            }
        }
    }
    public function render()
    {
        return view('livewire.register-petugas');
    }
}
