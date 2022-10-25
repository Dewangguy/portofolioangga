<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\Jenis_kontak;

class Kontak extends Model
{
    use HasFactory;
    protected $table = 'kontak';
    protected $guarded =['id'];              
    public function siswa(){
        return $this->belongsToMany(Siswa::class,'id_siswa');
    }
    public function jenis_kontak(){
        return $this->belongsTo(Jenis_kontak::class,'id_jenis');
    }
}
