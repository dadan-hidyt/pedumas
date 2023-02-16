<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Petugas;
use App\Models\Tanggapan;

class Tanggapan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tanggapan';
    public function tanggapan(){
        return $this->belongsTo(Tanggapan::class);
    }
    public function petugas(){
        return $this->belongsTo(Petugas::class,'id_petugas','id');
    }
}
