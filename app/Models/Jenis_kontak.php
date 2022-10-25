<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kontak;

class Jenis_kontak extends Model
{
    use HasFactory;
    protected $table = 'jenis_kontak';
    protected $guarded = ['id'];
    public function kontak(){
        return $this->hasMany(Kontak::class, 'id_jenis');
    }
}
