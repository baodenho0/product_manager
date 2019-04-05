<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract_Item extends Model
{
	public function Product(){
        return $this->belongsTo('App\Product','product_id','id');
    }
    protected $table = 'contract_items';
    protected $fillable = ['id','contract_id','product_id','quantity','price','income'];
    //protected $hidden = ['created_at','updated_at'];
}
