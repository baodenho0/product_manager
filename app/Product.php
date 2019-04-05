<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function productType(){
        return $this->belongsTo('App\ProductType');
    }

    protected $hidden = [
        'updated_at'
    ];
}
