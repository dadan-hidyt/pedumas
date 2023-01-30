<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Masyarakat extends Authenticatable
{
    use HasFactory;
    protected $guard = 'masyarakat';
    protected $table = 'masyarakat';
    protected $primaryKey = 'nik';
    protected $fillable = array(
        'nik',
        'nama',
        'username',
        'password'
    );
    protected $hidden = array(
        'password',
        'remember_token',
    );
}
