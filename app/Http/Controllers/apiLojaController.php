<?php

namespace App\Http\Controllers;
use App\Models\apiLoja;
use Illuminate\Http\Request;

class apiLojaController extends Controller
{
    public function index(){
        return apiLoja::all();

    }

    public function store(Request $req){
        apiLoja::create([
            "name" => $req->name,
            "price" => $req->price,
            "description" => $req->description
        ]);

        return response(["Information stored"], 200);
    }

    public function update(Request $req){
       $product = apiLoja::find($req->id);
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

    public function delete(Request $req){
        $product = apiLoja::find($req->id);
            if($product){
                $product->delete();
                return response(["Product Deleted"], 200);
            }else{
                return response(["Product not found"], 200);
            }
        
     }

}
