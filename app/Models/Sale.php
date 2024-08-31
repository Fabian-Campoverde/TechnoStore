<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'correlativo',
        'fechaEmision',
        'totalVenta',
        'totalPagado',
        'vendedor_id',
        'cliente_id',
        'cliente_doc',
        'cliente_nom',
        'cliente_direccion',
        'observacion',
        'metodoPago',
        'envio',
        'estado',
    ];

    public function buyer(){
        return $this->belongsTo(Buyer::class);
    }
}
