<?php

namespace App\Http\Controllers;
use App\Models\apiLoja;
use Illuminate\Http\Request;

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

    public function store(Request $req){ 
        apiLoja::create([
            "amount" => $req->amount,
            "products" => json_encode($req->products)
        ]);

        return response(["Sale saved"], 200);
    }

    public function update(Request $req){
       $product = apiLoja::find($req->sales_id);
        $return = "Information -";
        if($product->name != $req->name){
            $product->name = $req->name;
            $return .=" Name "; 
        }
        
        if($product->price != $req->price){
            $product->price = $req->price;
            $return .=" Price "; 
        }
        if($product->description != $req->description){
            $product->description = $req->description;
            $return .=" Description "; 
        }
        $product->save();
        $return .= "successfully changed ";
        return response([$return], 200);
    }


    public function cancelSale(Request $req){
        $sale = apiLoja::find($req->sales_id);
        if($sale){
            $sale->status = 0;
            $sale->save();
            return response('Sale id ' . $sale->sales_id . ' was successfully cancelled!', 404);

        }else{
            return response('Sale not found', 404);
        }
    }


    public function delete(Request $req){
        $product = apiLoja::find($req->id);
            if($product){
                $product->delete();
                return response(["Product Deleted"], 200);
            }else{
                return response(["Product not found"], 404 );
            }
        
     }

}
