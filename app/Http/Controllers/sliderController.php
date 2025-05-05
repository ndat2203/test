<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Slider;
use DB;
session_start();

class sliderController extends Controller
{
    public function authLogin() {
        $admin_id = session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_slider(){
        $this->authLogin();
        return view('admin.slider.add_slider');
    }

    public function save_slider(Request $request){
        $data = $request->all();
        $get_image = $request->file('slider_image');
        $slider = new Slider();
            $slider->slider_name = $data['slider_name'];

            $slider->slider_desc = $data['slider_desc'];
            $slider->slider_status = $data['slider_status'];
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/slider', $new_image);
            $slider->slider_image = $new_image;
        }else{
            $slider->slider_image = '';
        }
        $slider->save();
        toastr()->success('Thêm slider thành công');
        return Redirect::to('all-slider');
    }
    public function all_slider(){
        $this->authLogin();
        $slider = Slider::orderby('slider_id','desc')->get();
        return View('admin.slider.all_slider')->with(compact('slider'));
    }
    public function unactive_slider($slider_id){
        $this->authLogin();
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=> 1]);

        toastr()->success('Hiển thị slider thành công');
        return Redirect::to('all-slider');
    }
    public function active_slider($slider_id){
        $this->authLogin();
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=> 0]);
        toastr()->success('Ẩn slider thành công');
        return Redirect::to('all-slider');
    }
    public function delete_slider($slider_id){
        $this->authLogin();
        $slider = Slider::find($slider_id);
        $slider->delete();
        toastr()->success('Xóa slider thành công');
        return Redirect::to('all-slider');
    }
}
