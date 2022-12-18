<?php

namespace App\Http\Controllers\FreeIssue;

use App\Http\Controllers\Controller;
use App\Models\FreeIssues;
use App\Models\Products;
use ErrorException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class FreeIssueController extends Controller
{
    //RMA Job home
    public function home(){
        try {
        $homedata = FreeIssues::allFreeIssue();
        return view('pages.freeissues.free_issue_home')->with([
            'homedata'=> $homedata,
        ]);
            
        } catch (\Throwable $th) {
            dd($th);
        }

    }

    //Customer Create page
    public function create(Request $request){
        try {
            $products = Products::allProducts();
            return view('pages.freeissues.free_issue_create')->with(['products'=>$products]);
        } catch (QueryException $e) {
            $DangAdminMessage = ["alert" => ['type' => 'danger', "mssg" => "Some Error" . 'RMAA:000', "burl" => 'Freeissuehome']];
            return redirect()->back()->with($DangAdminMessage);
        } catch (\Exception $e) {
            $DangAdminMessage = ["alert" => ['type' => 'danger', "mssg" => "Some Error" . 'RMAA:000', "burl" => 'Freeissuehome']];
            return redirect()->back()->with($DangAdminMessage);
        }
    }

    public function store(Request $request)
    {
        try {
            $freeIsueid = FreeIssues::newSave($request->fril,$request->type,$request->prchpro, $request->freeprdt,$request->prchqty,$request->freeqty,$request->lowrlmt,$request->uprlimt);

            if(!$freeIsueid){
                throw new ErrorException('New Free Issues Save Fail');
            }else{

            }
            
            $DangMessage =["alert"=>['type'=>'danger' ,"mssg" =>"User create unsuccesfull", "burl"=>'Freeissuehome']];
            $SucsMessage = ["alert"=>['type'=>'success' , "mssg" =>"User Create SuccsessFull", "burl"=>'Freeissuehome']];
            return redirect()->back()->with($SucsMessage);
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with($DangMessage);
        }
    }

     //Customer Create page
     public function preview(Request $request){
        try {
            $freeisueData = FreeIssues::selectFreeIssue($request->token);
            return view('pages.freeissues.free_issue_preview')->with([
                'freeisueData'=>$freeisueData,
            ]);
        } catch (QueryException $e) {
            $DangAdminMessage = ["alert" => ['type' => 'danger', "mssg" => "Some Error" . 'RMAA:000', "burl" => 'Custhome']];
            return redirect()->back()->with($DangAdminMessage);
        } catch (\Exception $e) {
            $DangAdminMessage = ["alert" => ['type' => 'danger', "mssg" => "Some Error" . 'RMAA:000', "burl" => 'Custhome']];
            return redirect()->back()->with($DangAdminMessage);
        }
    }

    //Customer Create page
    public function edit(Request $request){
        try {
            $freeisueData = FreeIssues::selectFreeIssue($request->token);
            $products = Products::allProducts();
            return view('pages.freeissues.free_issue_edit')->with([
                'freeisueData'=>$freeisueData,
                'products' => $products,
            ]);
        } catch (QueryException $e) {
            $DangAdminMessage = ["alert" => ['type' => 'danger', "mssg" => "Some Error" . 'RMAA:000', "burl" => 'Custhome']];
            return redirect()->back()->with($DangAdminMessage);
        } catch (\Exception $e) {
            $DangAdminMessage = ["alert" => ['type' => 'danger', "mssg" => "Some Error" . 'RMAA:000', "burl" => 'Custhome']];
            return redirect()->back()->with($DangAdminMessage);
        }
    }

    public function update(Request $request)
    {
        try {
            $freeIsueid = FreeIssues::editSave($request->friId,$request->fril,$request->type,$request->prchpro, $request->freeprdt,$request->prchqty,$request->freeqty,$request->lowrlmt,$request->uprlimt);

            if(!$freeIsueid){
                throw new ErrorException('New Free Issues Edit Fail');
            }else{

            }
            
            $DangMessage =["alert"=>['type'=>'danger' ,"mssg" =>"User create unsuccesfull", "burl"=>'Freeissuehome']];
            $SucsMessage = ["alert"=>['type'=>'success' , "mssg" =>"User Create SuccsessFull", "burl"=>'Freeissuehome']];
            return redirect()->back()->with($SucsMessage);
        } catch (\Throwable $th) {
            return redirect()->back()->with($DangMessage);
        }
    }
}

