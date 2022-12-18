<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeIssues extends Model
{
    use HasFactory;
    protected $table = 'free_issues';
    protected $primaryKey = 'fii';
    public $timestamps = false;

    static function allFreeIssue(){
        $freIsuuses = FreeIssues::selectRaw('fii AS friId, fil As lable, IF(typ = 1,"Flat","Multiple") AS type, typ AS typId, a.prn AS purchsProd, b.prn AS freeProd,
                                            pqt AS purcqty, fqt AS freeqty, lmt As lowlim, ult AS uprlim, ppi AS purcproId, fpi AS freeproId')
                        ->leftjoin('products AS a','a.pri','free_issues.ppi')            
                        ->leftjoin('products AS b','b.pri','free_issues.fpi')            
                        ->get();
        return $freIsuuses;
    }

    static function newSave($lable,$type,$purchespro,$freeproduct,$purchesqty,$freeqty,$lowerlimit,$upperlimit){
        $table = new FreeIssues();
        $table->fil = $lable;
        $table->typ = $type;
        $table->ppi = $purchespro;
        $table->fpi = $freeproduct;
        $table->pqt = $purchesqty;
        $table->fqt = $freeqty;
        $table->lmt = $lowerlimit;
        $table->ult = $upperlimit;
       
        if($table->save()){
            return true;
        }else{
            return false;
        }
    }

    static function selectFreeIssue($freisId){
        $freIsuuse = FreeIssues::selectRaw('fii AS friId, fil As lable, IF(typ = 1,"Flat","Multiple") AS type, typ AS typId, a.prn AS purchsProd, b.prn AS freeProd,
                                            pqt AS purcqty, fqt AS freeqty, lmt As lowlim, ult AS uprlim, ppi AS purcproId, fpi AS freeproId')
                                ->leftjoin('products AS a','a.pri','free_issues.ppi')            
                                ->leftjoin('products AS b','b.pri','free_issues.fpi')
                                ->where('fii',$freisId)
                                ->first();
        return $freIsuuse;
    }

    static function editSave($friId,$lable,$type,$purchespro,$freeproduct,$purchesqty,$freeqty,$lowerlimit,$upperlimit){
        $table =  FreeIssues::find($friId);
        $table->fil = $lable;
        $table->typ = $type;
        $table->ppi = $purchespro;
        $table->fpi = $freeproduct;
        $table->pqt = $purchesqty;
        $table->fqt = $freeqty;
        $table->lmt = $lowerlimit;
        $table->ult = $upperlimit;
       
        if($table->save()){
            return true;
        }else{
            return false;
        }
    }
}
