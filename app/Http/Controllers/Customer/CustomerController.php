<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use ErrorException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //RMA Job home
    public function home(){
        try {
        $homedata = Customer::allCustomers();
        return view('pages.customer.customer_home')->with([
            'allCustomers'=> $homedata,
        ]);
            
        } catch (\Throwable $th) {
            dd($th);
        }

    }

    //Customer Create page
    public function create(Request $request){
        try {
            $number = random_number(4,[]);
            return view('pages.customer.customer_create')->with([
                'customercode'=>$number,
            ]);
        } catch (QueryException $e) {
            $DangAdminMessage = ["alert" => ['type' => 'danger', "mssg" => "Some Error" . 'RMAA:000', "burl" => 'Custhome']];
            return redirect()->back()->with($DangAdminMessage);
        } catch (\Exception $e) {
            $DangAdminMessage = ["alert" => ['type' => 'danger', "mssg" => "Some Error" . 'RMAA:000', "burl" => 'Custhome']];
            return redirect()->back()->with($DangAdminMessage);
        }
    }

    public function store(Request $request)
    {
        try {

            $sutomerId = Customer::newSave($request->cusnam,$request->cutcod,$request->cutadrs, $request->cutcontct);

            if(!$sutomerId){
                throw new ErrorException('New Customer Save Fail');
            }else{

            }
            
            $DangMessage =["alert"=>['type'=>'danger' ,"mssg" =>"User create unsuccesfull", "burl"=>'CustCreate']];
            $SucsMessage = ["alert"=>['type'=>'success' , "mssg" =>"User Create SuccsessFull", "burl"=>'CustCreate']];
            return redirect()->back()->with($SucsMessage);
        } catch (\Throwable $th) {
            return redirect()->back()->with($DangMessage);
        }
    }

     //Customer Create page
     public function preview(Request $request){
        try {
            
            $customerData = Customer::selectCustomers($request->token);
            return view('pages.customer.customer_preview')->with([
                'customerData'=>$customerData,
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
            $customerData = Customer::selectCustomers($request->token);
            return view('pages.customer.customer_edit')->with([
                'customerData'=>$customerData,
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

            $sutomerId = Customer::editSave($request->cuid,$request->cusnam,$request->cutcod,$request->cutadrs, $request->cutcontct);

            if(!$sutomerId){
                throw new ErrorException('New Customer Save Fail');
            }else{

            }
            
            $DangMessage =["alert"=>['type'=>'danger' ,"mssg" =>"User update unsuccesfull", "burl"=>'CustEdit']];
            $SucsMessage = ["alert"=>['type'=>'success' , "mssg" =>"User update SuccsessFull", "burl"=>'CustEdit']];
            return redirect()->back()->with($SucsMessage);
        } catch (\Throwable $th) {
            return redirect()->back()->with($DangMessage);
        }
    }
}


function random_number($maxlength, $array) {
    $chary = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
    $return_str = "CUS";
    for ( $x=0; $x<=$maxlength; $x++ ) {
        $return_str .= $chary[rand(0, count($chary)-1)];
    }
    return $return_str;
}