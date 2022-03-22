<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{

    public function allproduct()

    {
        $categories = Category::all();
        $products = Product::latest()->paginate(5);
        return view ('backend.allproduct',compact('products','categories'));

    }

    public function addproduct( Request $request)


    {
        $image = $request->file('image');
        $destinationPath = 'image';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);


        $products = new Product();
        $products->name = $request->name;
        $products->image = $profileImage;
        $products->price = $request->price;
        $products->category = $request->category;
        $products->description = $request->description;
        $products->save();

        return redirect()->back();
    }

    public function editproduct($id)
    {
        $products = Product::find($id);
        return view('backend.edit',compact('products'));

    }
    
    public function updateproduct(Request $request, $id)

    { 

    $image = $request->file('image');
    $destinationPath = 'image';
    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    $image->move($destinationPath, $profileImage);

    Product::find($id)->update([
    'name' => $request->name,
    'image' => $profileImage,
    'price' => $request->price,
    'description' => $request->description,

    ]);

    return redirect()->route('allProduct');

    }

    public function deleteproduct($id)

    {
        $product = Product::find($id)->delete();
        
        return redirect()->back();

    }

    public function showproduct($id)

    {

        $products = Product::find($id);
        return view('backend.show',compact('products'));

    }
   

}
