<?php

namespace App\Http\Controllers;
use App\Models\apiLoja;
use Illuminate\Http\Request;
use App\Models\products;

class apiLojaController extends Controller
{

    public function index(){
        return apiLoja::all();
    }

    public function getSpecific(Request $req){ 
        $sales = apiLoja::find($req->sales_id);
        if($sales)
            return $sales;
        else
            return response(["Sale not found"], 404);

    }
    public function getProducts(){
        $products = products::all();
        if($products)
            return $products;
        else
            return response(["No product registered"], 404);
    }

    public function store(Request $req){ 
    
        foreach($req->products as $key => $product){
            if(!products::find($req->products[$key]['product_id'])){
                return response(['Product ' . $req->products[$key]['nome'] . ' does not exist, please check the product id and try again.']);
            }
        }

            apiLoja::create([
                "amount" => $req->amount,
                "products" => json_encode($req->products)
            ]);

            return response(["Sale saved"], 200);
    }

    public function update(Request $req){
       $product = apiLoja::find($req->sales_id);
        $savedProducts = json_decode($product->products,true);
        array_push($savedProducts, $req->products);
        $product->products = json_encode($savedProducts);

        $product->save();
        
        return response(["Products successfully added to the sale"], 200);
    }


    public function cancelSale(Request $req){
        $sale = apiLoja::find($req->sales_id);
        if($sale){
            $sale->status = 0; //1 = sale is good to go | 0 = sale is cancelled
            $sale->save();
            return response('Sale id ' . $sale->sales_id . ' was successfully canceled!', 404);

        }else{
            return response('Sale not found', 404);
        }
    }

    public function delete(Request $req){
        $product = apiLoja::find($req->id);
            if($product){
                $product->delete();
                return response(["Sale Deleted"], 200);
            }else{
                return response(["Sale not found"], 404);
            }
        
     }

}
