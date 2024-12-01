<?php

namespace App\Models;
use App\Models\User;
use App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }
    public function product(){
        return $this->hasOne('App\Models\Product','id','product_id');
    }
}
