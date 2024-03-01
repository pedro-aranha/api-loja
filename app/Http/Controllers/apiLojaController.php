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

        return response(["Ok", 200]);
    }

}
