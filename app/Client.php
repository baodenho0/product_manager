<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table='clients';
    protected $fillable=['id', 'name', 'band', 'cubic', 'phone'];
    public function Bill(){
    	return $this->hasMany('App\Bill');
    }
}