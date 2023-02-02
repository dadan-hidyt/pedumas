<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    public $timestamps = false;
    protected $fillable = array(
        'judul_pengaduan',
        'isi_laporan',
        'tgl_pengaduan',
        'foto'
    );
    public function masyarakat(){
        return $this->belongsTo(\App\Models\Masyarakat::class,'nik');
    }
    public function tanggapan(){
      return $this->hasMany(\App\Models\Tanggapan::class,'id_pengaduan');      
    }
    public static function boot(){
        parent::boot();
        static::deleting(fn($pengaduan)=>$pengaduan->tanggapan()->delete());
    }

}
