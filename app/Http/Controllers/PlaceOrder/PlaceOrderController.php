<?php

namespace App\Http\Controllers\PlaceOrder;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\PlaceOrder;
use App\Models\Products;
use ErrorException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PlaceOrderController extends Controller
{
     //RMA Job home
     public function home(){
        try {
        $homedata = PlaceOrder::getAllOrders();
        return view('pages.placeorder.place_order_home')->with([
            'homedata'=>  $homedata,
        ]);
            
        } catch (\Throwable $th) {
            dd($th);
        }

    }

    //Customer Create page
    public function create(Request $request){
        try {
            $number = random_number(4,[]);
            $customers = Customer::allCustomers();
            $products = Products::allProducts();
            return view('pages.placeorder.place_order_create')->with([
                'ordcode'=>$number,
                'customers'=>$customers,
                'products'=>$products
            ]);
        } catch (QueryException $e) {
            $DangAdminMessage = ["alert" => ['type' => 'danger', "mssg" => "Some Error" . 'RMAA:000', "burl" => 'PlcOrdrhome']];
            return redirect()->back()->with($DangAdminMessage);
        } catch (\Exception $e) {
            $DangAdminMessage = ["alert" => ['type' => 'danger', "mssg" => "Some Error" . 'RMAA:000', "burl" => 'PlcOrdrhome']];
            return redirect()->back()->with($DangAdminMessage);
        }
    }

  
}


    function random_number($maxlength, $array) {
            $chary = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
            $return_str = "PLOR";
            for ( $x=0; $x<=$maxlength; $x++ ) {
                $return_str .= $chary[rand(0, count($chary)-1)];
            }
            return $return_str;
    }
