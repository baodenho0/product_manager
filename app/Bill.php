<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function company(){
        return $this->belongsTo('App\Company');
    }
    public function detail(){
        return $this->belongsToMany('App\Product','product_bills','bill_id','product_id')
                    ->withPivot('quantity', 'price');
    }
    protected $hidden = ['updated_at','user_id','company_id'];
}
