<?php
// app/Models/Lokasi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';
    protected $primaryKey = 'id_lokasi';
    
    protected $fillable = [
        'koordinat_lokasi',
        'alamat_lokasi_tujuan',
        'keterangan',
        'id_transaksi',
    ];
    
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }
}
