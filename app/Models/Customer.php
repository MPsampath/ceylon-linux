<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'cui';
    public $timestamps = false;

    static function newSave($name,$code,$addres,$number){
        $table = new Customer();
        $table->cun = $name;
        $table->cuc = $code;
        $table->adr = $addres;
        $table->mbl = $number;
       
        if($table->save()){
            return true;
        }else{
            return false;
        }
    }

    static function allCustomers(){
        $customers = Customer::selectRaw('cui AS cusId, cun AS custNam, adr AS cuadrs, cuc AS custCode,CONCAT(0,mbl) AS mobilnum')->get();
        return $customers;
    }

    static function selectCustomers($cuid){
        $customers = Customer::selectRaw('cui AS cusId, cun AS custNam, adr AS cuadrs, cuc AS custCode, CONCAT(0,mbl) AS mobilnum')->where('cui',$cuid)->first();
        return $customers;
    }

    static function editSave($cuid,$name,$code,$addres,$number){
        $table = Customer::find($cuid);
        $table->cun = $name;
        $table->cuc = $code;
        $table->adr = $addres;
        $table->mbl = $number;
       
        if($table->save()){
            return true;
        }else{
            return false;
        }
    }
}
