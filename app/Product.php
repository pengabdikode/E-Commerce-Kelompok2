<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table='products';
    protected $fillable = [
    'name', 'harga', 'id_brand', 'id_category', 'foto', 'description',
    ];

    public function category()
    {
    	return $this->belongsTo(\App\Category::class, 'id_category');
    }

    public function brand()
	{
    return $this->belongsTo(\App\Brand::class, 'id_brand');
	}

    public function stoc()
    {
        return $this->hasMany(Stock::class);
    }
}
