<?php
// app/Models/Kurir.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kurir extends Model
{
    protected $table = 'kurir';
    protected $primaryKey = 'id_kurir';
    
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'no_hp',
    ];
    
    public function pengirimans()
    {
        return $this->hasMany(Pengiriman::class, 'id_kurir');
    }
}
