<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penerimaan extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "jalur_penerimaan";
    protected $guarded = ["id"];
}
