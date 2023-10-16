<?php
// app/Models/Gas.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gas extends Model
{
    protected $table = 'gas';
    protected $primaryKey = 'id_gas';
    
    protected $fillable = [
        'name_gas',
        'berat_gas',
        'stock_gas',
        'harga_gas',
        'jenis_gas',
    ];
    
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'id_gas');
    }
}
