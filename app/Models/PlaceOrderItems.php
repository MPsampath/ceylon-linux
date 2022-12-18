<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceOrderItems extends Model
{
    use HasFactory;
    protected $table = 'place_order_items';
    protected $primaryKey = 'rid';
    public $timestamps = false;

}


