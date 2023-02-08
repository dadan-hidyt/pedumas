<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Auth;

class Login extends Component
{
    public $user;
    public $login_sebagai = 'masyarakat';
    protected $rules = [
        'user.username' => 'required',
        'user.password' => 'required',
    ];
    protected $validationAttributes = array(
        'user.username' => "Username",
        'user.password' =>'password'
    );
    public function login()
    {
        $this->validate();
        /**
         * Login Sebagai masyarakat
         */
        $loginMasyarakat = Auth::guard('masyarakat')->attempt($this->user,true);
        $loginPetugas = Auth::guard('petugas')->attempt($this->user,true);
        if($this->login_sebagai ==='masyarakat'){
            if ($loginMasyarakat === true) {
                return redirect()->route('masyarakat.dashboard');
            } else {
              session()->flash('login_gagal',"Login Sebagai masyarakat gagal : Akun tidak di temukan!");
          }
      } else if($this->login_sebagai ==='petugas'){
        if ($loginPetugas === true) {
            return redirect()->route('petugas.dashboard');
        } else {
          session()->flash('login_gagal',"Login Sebagai petugas gagal : Akun tidak di temukan!");
      }
  } else {
      session()->flash('login_gagal',"Kesalahan tidak di ketahui");
  }
}
public function render()
{
    return view('livewire.login', ['user' => $this->user]);
}
}