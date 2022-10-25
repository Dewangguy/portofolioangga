<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $guarded = ['id'];

    public function kontak(){
        return $this->belongsToMany('App\Models\Jenis_kontak')->withPivot('deskripsi');
    }
    public function project(){
        return $this->hasMany('App\Models\Projek', 'id_siswa');
    }
}
