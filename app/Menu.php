<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    protected $table = 'menus';

    public function items(){
        return $this->hasMany('App\MenuItem');
    }
}
