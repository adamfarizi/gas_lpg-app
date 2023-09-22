<?php
// app/Models/Truck.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    protected $table = 'truck';
    protected $primaryKey = 'id_truck';
    
    protected $fillable = [
        'plat_truck',
        'maksimal_beban_truck',
    ];
    
    public function pengirimans()
    {
        return $this->hasMany(Pengiriman::class, 'id_truck');
    }
}
