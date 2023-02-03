<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Petugas extends Authenticatable
{
    use HasFactory;
    protected $guard = 'petugas';
    protected $table = 'petugas';
    protected $guarded = [
        'password',
        'remember_token',
    ];
    public $timestamps = false;
    protected $fillable = [
        'nama_petugas',
        'no_telp',
        'username',
        'password',
        'level',
    ];
}
