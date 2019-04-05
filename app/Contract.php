<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
	public function user(){
        return $this->belongsTo('App\User');
    }
    public function items(){
       return  $this->hasMany('App\Contract_Item','contract_id','id');
    }
    protected $table = 'contracts';
    protected $fillable = ['id','contract_code','customer_name','note','user_id'];
    protected $hidden = ['created_at','updated_at'];
}
