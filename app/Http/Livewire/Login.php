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
    public function login()
    {
        $this->validate();
        /**
         * Login Sebagai masyarakat
         */
        $loginMasyarakat = Auth::guard('masyarakat')->attempt($this->user,true);
        if($loginMasyarakat === true){
            return redirect()->intended('dashboard');
        }
    }
    public function render()
    {
        return view('livewire.login', ['user' => $this->user]);
    }
}