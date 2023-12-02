<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    function list(Request $request)
    {
        $status = $request->input('status');
        if ($status == "trash") {
            $sliders = Slider::onlyTrashed()->latest()->paginate(10);

        } else {
            $kw = "";
            if ($request->input('kw')) {
                $kw = $request->input('kw');
            }
            $sliders = Slider::where('slider_title', 'LIKE', '%' . $kw . '%')->paginate(10);
        }
        $count_slider_active = Slider::count();
        $count_slider_trash = Slider::onlyTrashed()->count();

        $count = [$count_slider_active, $count_slider_trash];
        return view('admin.slider.list', compact('sliders','count'));
    }

    function add()
    {
        return view('admin.slider.add');
    }

    function store(Request $request)
    {
        $request->validate([
            'slider_title' => 'required|string|max:255',
            'slider_desc' => 'required',
            'slider_url' => 'required',
            'user_id' => 'required|exists:users,id',
            'file' => 'required|image|mimes:jpeg,png,gif|max:2048', // Validation for the file upload
        ]);
        $input = $request->all();
        if ($request->hasFile('file')) {
            echo $file = $request->file;
            //lấy tên file
            echo $filename = $file->getClientOriginalName();
            // lấy đuôi file
            echo $file->getClientOriginalExtension();
            //Lấy kích thước file
            echo $file->getsize();

            $file->move('public/images', $file->getClientOriginalName());
            $slider_image = 'public/images' . $filename;
            $input['slider_image'] = $slider_image;
        }
        // $input['user_id'] = 1;
        Slider::create($input);



        return redirect()->route('slider.list')->with(['status' => 'Thêm thành công']);

    }

    // function edit($id)
    // {
    //     $slider = Slider::find($id);

    // }

    // function update(Request $request, $id){
    //     $request->validate([
    //         'image_name' => 'required|string|max:255',
    //         'status' => 'required',
    //         'user_id ' => 'required|exists:users,id',
    //         'file' => 'required|image|mimes:jpeg,png,gif|max:2048',




    //     ]);
    //     $input = $request->all();
    //     if ($request->hasFile('file')) {
    //         echo $file = $request->file;
    //         //lấy tên file
    //         echo $filename = $file->getClientOriginalName();
    //         // lấy đuôi file
    //         echo $file->getClientOriginalExtension();
    //         //Lấy kích thước file
    //         echo $file->getsize();

    //         $file->move('admin/slider', $file->getClientOriginalName());
    //         $image_path = 'admin/slider/' . $filename;
    //         $input['image_path'] = $image_path;
    //     }
    //     // $input['user_id'] = 1;
    //     Slider::find($id)->update($input);



    //     return redirect()->route('slider.list')->with(['status' => 'Sửa thành công']);
    // }
}
