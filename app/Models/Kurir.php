<?php
// app/Models/Kurir.php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Kurir extends Model implements Authenticatable
{
    use AuthenticableTrait, HasApiTokens;
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

    public function hasRole($role)
    {
        return $this->role === $role;
    }

}
