<?php
// app/Models/Pembayaran.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    
    protected $fillable = [
        'status_pembayaran',
        'tanggal_pembayaran',
        'bukti_pembayaran',
    ];
    
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'id_pembayaran');
    }
}
