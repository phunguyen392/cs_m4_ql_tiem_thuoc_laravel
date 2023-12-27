<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function categoryIndex(){
        $categories = Category::all();
        // return ProductResource::collection($products);
        return response()->json($categories);
    }




    public function productIndex(){
        $products = Product::all();
        // return ProductResource::collection($products);
        return response()->json($products);
    }

  public function productShow($id){
    $product = Product::with('category')->find($id);
    return response()->json($product);

  }
}