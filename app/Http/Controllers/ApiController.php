<?php

use App\Models\Product;
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;



class ApiController extends Controller
{
    public function home()
    {
        $slider = Slider::all();
        $categories = Category::all();
        $products = Product::all();
        return response()->json(['products' => $products, 'slider' => $slider, 'categories' => $categories], 200);
    }

    public function allCategory()
    {
        $categories = Category::all();
        return response()->json(['categories' => $categories], 200);
    }
    public function allProduct()
    {
        $products = Product::all();
        return response()->json(['products' => $products], 200) ;
    }
    public function allSlider()
    {
        $slider = Slider::all();
        return response()->json(['slider' => $slider],200) ;
    }

    public function addCategory(Request $request)

    {
        $category = new Category();
        $category->name = $request->name;
        $result         = $category->save();

        if($result){
        return ["result" => "Data Save Succefully"];
        }
        else
        {
            return ["result" => "Something Wrong"];
        }
    }

    

   
}
