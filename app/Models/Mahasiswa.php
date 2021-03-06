<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "mahasiswa";
    protected $guarded = ["id"];
     public function jurusan()
    {
        return $this->hasOne(Jurusan::class,'id','jurusan_id');
    }
}
