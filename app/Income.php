<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table='income';
    protected $fillable = [
    'id_user', 'payment_method', 'bank_code', 'amount_money',
    ];

    public function incomeUser()
    {
    	return $this->belongsTo(\App\User::class, 'id_user');
    }

    public function bankIncome()
    {
    	return $this->belongsTo(\App\Bank::class, 'bank_code');
    }
}
