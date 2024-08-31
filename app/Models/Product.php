<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','descripcion','image_url','codigoId','stock','precio_venta',
    'precio_compra','stock_minimo','category_id','measure_id','brand_id','provider_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function measure(){
        return $this->belongsTo(Measure::class);
    }

    public function provider(){
        return $this->belongsTo(Provider::class);
    }
    
}
