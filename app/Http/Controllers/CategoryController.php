<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    public function allcategory()
    {
        // $categories = DB::table('categories')
        //             ->join('products','categories.id','products.id')
        //             ->select('categories.name','products.*')
        //             ->get();
        $categories = Category::all();
        return view('backend.category',['categories' => $categories]);
    }
    public function addcategory(Request $request)
    {
        $data = new Category ();
        $data->name = $request->name;
        $data->save();
        return back(); 
    }
    public function categorydelete($id)
    {

        $data = Category::find($id)->delete();

    }


}
