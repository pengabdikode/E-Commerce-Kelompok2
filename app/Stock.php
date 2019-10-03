<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table='stock';
    protected $fillable = [
    'size', 'amount', 'id_product',
    ];

    public function product()
    {
    	return $this->belongsTo(\App\Product::class, 'id_product');
    }

}
