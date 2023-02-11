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
    public $timestamps = false;
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
    public function pengaduan(){
        return $this->hasMany(\App\Models\Pengaduan::class,'nik');
    }
    public static function boot(){
        parent::boot();
        static::deleting(function($masyarakat){
            $masyarakat->pengaduan()->delete();
        });
    }
}
