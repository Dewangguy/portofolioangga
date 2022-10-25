<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;

class Projek extends Model
{
    use HasFactory;
    protected $table = 'projek';
    protected $guarded = ['id'];
    public function siswa(){
        return $this->belongsTo('App\Models\Siswa', 'id_siswa');
    }
}
