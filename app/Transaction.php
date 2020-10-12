<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = [
        'uuid',
        'customer_name', 
        'address',
        'phone',
        'transaction_total',
        'transaction_status'
    ];

    public function details()
    {
        return $this->hasMany('App\TransactionDetail');
    }
}
