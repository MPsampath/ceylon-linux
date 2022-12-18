<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PlaceOrder extends Model
{
    use HasFactory;
    protected $table = 'place_orders';
    protected $primaryKey = 'poi';
    public $timestamps = false;

    static function getAllOrders(){
       $allPo = PlaceOrder::selectRaw('a.cun AS custnm, place_orders.poi AS poId, ord AS orderdate, odt AS ordertime, b.netammount , place_orders.poi')
                            ->leftjoin('customers AS a','a.cui','place_orders.cui')
                            ->leftjoin(DB::raw('(SELECT a.poi, SUM(b.cst * a.qty) AS netammount FROM `place_order_items` AS a 
                                                    LEFT JOIN `products` AS b  
                                                    ON b.pri = a.pri GROUP BY a.poi ) AS b'),'b.poi','place_orders.poi')
                            ->get();
        return $allPo;
    }

    function items(){
        return $this->hasMany(PlaceOrderItems::class, 'poi', 'poi')::selectRaw('a.prn AS pronam, a.pri AS prodId, rid AS recordId, poi, qty AS quntyty, a.cst AS cost')
                    ->leftjoin('products AS a','a.pri','place_order_items.pri');
    }
}
