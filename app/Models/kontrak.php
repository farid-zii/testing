<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontrak extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function pegawai(){
        return $this->belongsTo(pegawai::class);
    }
}
