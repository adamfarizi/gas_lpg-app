<?php
// app/Models/Agen.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agen extends Model
{
    protected $table = 'agen';
    protected $primaryKey = 'id_agen';
    
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'alamat',
        'no_hp',
    ];
    
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'id_agen');
    }
}
