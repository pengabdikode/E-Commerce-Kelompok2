<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table='transaksi';
    protected $fillable = [
    'id_user', 'size', 'amount', 'amount_money', 'status', 'bank_code', 'id_product', 'price',
    ];

    public function transactionUser()
    {
    	return $this->belongsTo(\App\User::class, 'id_user');
    }

     public function transactionProduct()
    {
    	return $this->belongsTo(\App\Product::class, 'id_product');
    }

    public function bankTransac()
    {
    	return $this->belongsTo(\App\Bank::class, 'bank_code');
    }
}
