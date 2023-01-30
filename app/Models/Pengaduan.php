<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    public function masyarakat(){
        return $this->belongsTo(\App\Models\Masyarakat::class,'nik');
    }
    public function tanggapan(){
      return $this->hasMany(\App\Models\Tanggapan::class,'id_pengaduan');      
  }
}
