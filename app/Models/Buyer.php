<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

    protected $fillable = ['documento','nro_doc','nombre','correo','direccion','telefono'];

    public function sales(){
        return $this->hasMany(Sale::class);
    }
}
