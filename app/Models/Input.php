<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;

    protected $fillable= ['comprobante','fechaCompra','totalCompra','provider_id'];

    public function provider()  
    {
     return $this->belongsTo(Provider::class);   
    }

    public function inputDetails()
    {
        return $this->hasMany(InputDetail::class);
    }
}
