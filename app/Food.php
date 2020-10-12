<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    // define food class with condition 1 food is have one tag
    // otherwhise one tag have many food 
    
    protected $table = 'foods';

    public function tags()
    {
        return $this->belongsTo('App\Tag', 'tag_id');
    }

    public function details()
    {
        return $this->hasMany('App\TransactionDetail');
    }
}
