<?php
// app/Models/Transaksi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    
    protected $fillable = [
        'tanggal_transaksi',
        'resi_transaksi',
        'jumlah_transaksi',
        'total_transaksi',
        'id_agen',
        'id_admin',
        'id_gas',
        'id_pengiriman',
        'id_pembayaran',
    ];
    
    public function pengiriman()
    {
        return $this->belongsTo(Pengiriman::class, 'id_pengiriman');
    }

    public function gas()
    {
        return $this->belongsTo(Gas::class, 'id_gas');
    }

    public function agen()
    {
        return $this->belongsTo(Agen::class, 'id_agen');
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_pembayaran');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }

    public function lokasi(): HasMany
    {
        return $this->hasMany(Lokasi::class, 'id_transaksi', 'id_transaksi');
    }
}
