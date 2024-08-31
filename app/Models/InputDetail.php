<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputDetail extends Model
{
    use HasFactory;

    protected $fillable=['product_id','input_id','precio','cantidad','total_producto'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function input(){
        return $this->belongsTo(Input::class);
    }
}
