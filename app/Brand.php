<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $table='brand';
      protected $fillable = [
        'name', 'description', 'url',
    ];

    public function brandpro()
    {
    	return $this->hasMany(Product::class);
    }
}
