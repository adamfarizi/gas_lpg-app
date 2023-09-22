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
        'status_pengiriman',
        'id_kurir',
        'id_pengiriman',
        'id_truck',
    ];
    
    public function pengiriman()
    {
        return $this->belongsTo(Pengiriman::class, 'id_pengiriman');
    }
}
