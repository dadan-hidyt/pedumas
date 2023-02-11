<?php

namespace App\Http\Livewire\Petugas;
use App\Models\Petugas;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\PetugasLivewireValidationTrait;

class AddPetugas extends Component
{
    use PetugasLivewireValidationTrait;
    /**
     * Tambah
     */
    public function tambah(){
        $this->validate();
        if($this->checkUsername($this->petugas['username'])){
           session()->flash('error_username', "Useranme sudah ada yang mengunakan!");
        }else{
            //make hash password
            $this->petugas['password'] = Hash::make($this->petugas['password']);
            //create petugas
            if(Petugas::create($this->petugas)){
                return redirect()->route('petugas.manage-petugas.index');
            } else{
                session()->flash('error', "Data Gagal di tambahkan!");
            }
        }
    }
    /**
     * render
     */
    public function render()
    {
        return view('livewire.petugas.add-petugas');
    }
}
