<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
     protected $table='categories';
     protected $fillable = [
        'name', 'description', 'url',
    ];

    public function catpro()
    {
    	return $this->hasMany(Product::class);
    }
}
