<?php
// app/Models/Agen.php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Agen extends Model implements Authenticatable
{
    use AuthenticableTrait, HasApiTokens;
    protected $table = 'agen';
    protected $primaryKey = 'id_agen';
    
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'alamat',
        'koordinat',
        'no_hp',
    ];
    
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'id_agen');
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }

}
