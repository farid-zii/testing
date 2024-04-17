<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function pegawai(){
        return $this->hasMany(pegawai::class);
    }
    public function kontrak(){
        return $this->belongsTo(kontrak::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pegawai) {
            $yearMonth = now()->format('Ym'); // Mendapatkan format tahun dan bulan (misal: 202204)
            $count = static::whereYear('created_at', now()->year)
                           ->whereMonth('created_at', now()->month)
                           ->count() + 1; // Menghitung jumlah karyawan pada bulan ini dan menambahkan 1

            $pegawai->nomor_induk = $yearMonth . '-' . str_pad($count, 3, '0', STR_PAD_LEFT);
        });
    }
}
