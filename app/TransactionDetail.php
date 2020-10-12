<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'transactions_details';
    protected $fillable = [
        'transaction_id',
        'food_id',
        'notes'
    ];

    public function food()
    {
        return $this->belongsTo('App\Food', 'food_id');
    }

    public function transaction()
    {
        return $this->belongsTo('App\Transaction', 'transaction_id');
    }
}
