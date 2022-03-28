<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Member;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    public function home()
    {
        $products = Product::latest()->paginate();
        $sliders = Slider::all();
        $categories = Category::all();
        // $categories = DB::table('categories')->select('id','name')->where('name','like','%')->orderByDesc('id')->get();
        return view('frontend.index',compact('products','sliders','categories'));

    }


    // public function readdata()
    
    // {
       
    //     $products = Product::latest()->paginate();
    //     return view('frontend.products',compact('products'));

    // }

    public function showproduct($id)
    {
        
        $products = Product::find($id);
        $simillar = DB::table('products')
                    ->where('products.category', $products->category)
                    ->get();
        return view('frontend.show',compact('products','simillar'));

    }

    // public function nav()
    // {
    //     $categories = DB::table('categories')->pluck('name');
    //     return view('frontend.navbar',compact('categories'));
    // }

    public function productsshow($id)
    {
        $categories = Category::find($id);
        $data = DB::table('products')->where('products.category',$categories->name)->get();
        return view ('frontend.productshow',compact('data'));
    }

    public function search(Request $request)
    {
       $products = Product::
                   where('name', 'like', '%'. $request->search.'%')
                    ->get();
        return view('frontend.search',['products' => $products]);
    }

    public function login()
    
    {
        return view('frontend.login');
    }

    public function register()
    
    {
        return view('frontend.register');
    }

    public function memberStore(Request $request)

    {
        $members = new Member();

        $members->name = $request->name;
        $members->email = $request->email;
        $members->password = $request->password;
        $members->confirm_password = $request->confirm_password;
        $members->save();

        return redirect()->back();
    }


    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // $email = $request->email;
        // $password = $request->password;

        // $member = DB::table('members')->where('email', $email )->where('password', $password)->first();
   

        $checkLogin = $request->only('email', 'password');

        if(Auth::attempt($checkLogin)){
            return redirect()->route('home');
        }

        else{
            return redirect()->route('custome/loginblade');
        }

        // if(Auth::attempt($checkLogin)) {
        //     return view('dashboard');
        // }

        // else
        // {
        // return view("frontend.login")->with(['error'=> "Invalid email or Password!!"]);
        // }
    }

    public function customLogout()

    {
        
        Auth::logout();
        
       

        return redirect()->back();

    }

  


}
