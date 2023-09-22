<?php
// app/Models/Gas.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gas extends Model
{
    protected $table = 'gas';
    protected $primaryKey = 'id_gas';
    
    protected $fillable = [
        'jenis_gas',
        'stock_gas',
        'harga_gas',
    ];
    
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'id_gas');
    }
}
