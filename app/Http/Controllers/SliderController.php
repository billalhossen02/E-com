<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function addslider(Request $request)
    
    {
        $image = $request->file('image');
        $destination = 'Slider';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destination, $profileImage);
        
        $data = new Slider();
        $data->image = $profileImage;
        $data->save();

        return back();

    }


    public function allslider()
    {
        $slider = Slider::latest()->paginate();
        return view('backend.slider',compact('slider'));

    }

    public function viewslider()
    {
        $sliders = Slider::all();
        return view('frontend.slider',compact('sliders'));

    }

    public function deleteSlider($id)
    {
 
        $slider = Slider::find($id)->delete();

        return back();

    }

}
