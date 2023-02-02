<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masyarakat;
class AkunController extends Controller
{
    public function update(Request $request){
        $request->validate([
            'nama' => 'string',
            'username' => 'string',
        ]);
        $oldUsername = auth()->guard('masyarakat')->user()->username;
        if (Masyarakat::whereUsername($request->username)->count() > 0 && $oldUsername != $request->username) {
            return redirect()->back()->withErrors(['username'=>"Username alerdy exists!"]);
        }
        auth()->guard('masyarakat')->user()->update($request->all());
        return redirect()->back()->withErrors(['success'=>"Akun berhasil di update!"]);
    }
}
