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

    public function store(Request $request)
    {
        try {
            $product = Products::newSave($request->pronam,$request->procod,$request->price, $request->expdat);

            if(!$product){
                throw new ErrorException('New Produt Save Fail');
            }else{

            }
            
            $DangMessage =["alert"=>['type'=>'danger' ,"mssg" =>"Product create unsuccesfull", "burl"=>'ProdctCreate']];
            $SucsMessage = ["alert"=>['type'=>'success' , "mssg" =>"Product Create SuccsessFull", "burl"=>'ProdctCreate']];
            return redirect()->back()->with($SucsMessage);
        } catch (\Throwable $th) {
            return redirect()->back()->with($DangMessage);
        }
    }

    //Customer Create page
    public function preview(Request $request){
        try {
            
            $productData = Products::selectProduct($request->token);
            
            return view('pages.product.product_preview')->with([
                'productData'=>$productData,
            ]);
        } catch (QueryException $e) {
            $DangAdminMessage = ["alert" => ['type' => 'danger', "mssg" => "Some Error" . 'RMAA:000', "burl" => 'Prodcthome']];
            return redirect()->back()->with($DangAdminMessage);
        } catch (\Exception $e) {
            $DangAdminMessage = ["alert" => ['type' => 'danger', "mssg" => "Some Error" . 'RMAA:000', "burl" => 'Prodcthome']];
            return redirect()->back()->with($DangAdminMessage);
        }
    }

    //Customer Create page
    public function edit(Request $request){
        try {
            $productData = Products::selectProduct($request->token);
            return view('pages.product.product_edit')->with([
                'productData'=>$productData,
            ]);
        } catch (QueryException $e) {
            $DangAdminMessage = ["alert" => ['type' => 'danger', "mssg" => "Some Error" . 'RMAA:000', "burl" => 'Prodcthome']];
            return redirect()->back()->with($DangAdminMessage);
        } catch (\Exception $e) {
            $DangAdminMessage = ["alert" => ['type' => 'danger', "mssg" => "Some Error" . 'RMAA:000', "burl" => 'Prodcthome']];
            return redirect()->back()->with($DangAdminMessage);
        }
    }

    public function update(Request $request)
    {
        try {
            $product = Products::editSave($request->prid,$request->pronam,$request->procod,$request->price, $request->expdat);

            if(!$product){
                throw new ErrorException('New Customer Save Fail');
            }else{

            }
            
            $DangMessage =["alert"=>['type'=>'danger' ,"mssg" =>"Product update unsuccesfull", "burl"=>'ProdctEdit']];
            $SucsMessage = ["alert"=>['type'=>'success' , "mssg" =>"Product update SuccsessFull", "burl"=>'ProdctEdit']];
            return redirect()->back()->with($SucsMessage);
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with($DangMessage);
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
