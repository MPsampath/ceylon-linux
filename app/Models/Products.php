<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'pri';
    public $timestamps = false;

    static function allProducts(){
        $products = Products::selectRaw('pri AS proId, prn AS proNam, cst AS cost, exd AS expdt')->get();
        return $products;
    }
}
