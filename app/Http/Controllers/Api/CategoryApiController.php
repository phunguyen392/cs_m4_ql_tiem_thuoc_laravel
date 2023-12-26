<?php
namespace App\Http\Controllers\Controller;
use App\Models\Category;



class CategoryApiController extends Controller 
{
    public function index(){

        $category = Category::all();
        return response()->json($categories);
    }

}