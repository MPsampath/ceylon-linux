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
        $products = Products::selectRaw('pri AS proId, prn AS proNam, prc AS code, cst AS cost, exd AS expdt')->get();
        return $products;
    }

    static function newSave($name,$code,$price,$date){
        $table = new Products();
        $table->prn = $name;
        $table->prc = $code;
        $table->cst = $price;
        $table->exd = $date;
        if($table->save()){
            return true;
        }else{
            return false;
        }
    }

    static function selectProduct($proId){
        $products = Products::selectRaw('pri AS proId, prn AS proNam,prc AS code, cst AS cost, exd AS expdt')->where('pri',$proId)->first();
        return $products;
    }

    static function editSave($prdId,$name,$code,$price,$date){
        $table = Products::find($prdId);
        $table->prn = $name;
        $table->prc = $code;
        $table->cst = $price;
        $table->exd = $date;
        if($table->save()){
            return true;
        }else{
            return false;
        }
    }
}
