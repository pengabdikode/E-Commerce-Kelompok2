<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
     protected $table='bank';
     protected $fillable = [
        'name', 'code',
    ];

    public function code()
    {
    	return $this->hasMany(Transaction::class);
    }

    public function code2()
    {
    	return $this->hasMany(Income::class);
    }
}
