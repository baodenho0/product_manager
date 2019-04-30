<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    // protected $table = "bills";
    
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
    public function client(){
        return $this->belongsTo('App\Client');
    }
    public function product_bill(){
        return $this->hasMany('App\ProductBill');
    }
    protected $hidden = ['updated_at','user_id','company_id'];
}
