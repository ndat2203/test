<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class galleryController extends Controller
{
    public function authLogin() {
        $admin_id = session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_gallery($product_id){
        $pro_id = $product_id;
        return view('admin.gallery.add_gallery')->with('pro_id', $pro_id);
    }

    public function select_gallery(Request $request){
        $product_id = $request->pro_id;
        $gallery = Gallery::where('product_id', $product_id)->get();
        $gallery_count = $gallery->count();
        $output = '
            <form>
                '.csrf_field().'
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Thứ tự</th>
                            <th>Tên hình ảnh</th>
                            <th>Hình ảnh</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
        ';
        if($gallery_count > 0 ){
            $i = 0;
            foreach($gallery as $key => $val){
                $i++;
                $output.='
                    <tr>
                        <td>'.$i.'</td>
                        <td contenteditable class="edit_name_gal" data-gal_id="'.$val->gallery_id.'">'.$val->gallery_name.'</td>
                        <td>
                            <img src="'.url('public/upload/gallery/'.$val->gallery_image).'" class="img-thumbnail" width="120px" height="120px">
                            <input type="file" class="file_name" accept="image/*" data-gal_id ="'.$val->gallery_id.'" id="file-'.$val->gallery_id.'" name="file" >
                        </td>
                        <td>
                            <button type="button" data-gal_id ="'.$val->gallery_id.'" class="btn btn-xs btn-danger delete-gallery" >Xoá</button>
                        </td>
                    </tr>
                </form>
                ';
            }
        }else{
            $output.='
                <tr>
                    <td colspan="4">Sản phẩm này chưa có ảnh</td>
                </tr>
            ';
        }
        $output .='
                </tbody>
               </table>
            </form>
        ';
        echo $output;
    }
    public function insert_gallery(Request $request, $pro_id){
         $get_image = $request->file('file');
         if($get_image){
            foreach($get_image as $image){
                $get_name_image = $image->getClientOriginalName();
                // phan tach chuoi sau dau cham cua anh
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
                $image->move('public/upload/gallery', $new_image);
                $gallery = new Gallery();
                $gallery->gallery_name =  $new_image;
                $gallery->gallery_image =  $new_image;
                $gallery->product_id = $pro_id;
                $gallery->save();

            }
         }
        toastr()->success('Thêm ảnh thành công');

        return Redirect()->back();
    }
    public function update_gallery_name(Request $request){
        $gal_id = $request->gal_id;
        $gal_text = $request->gal_text;
        $gallery = Gallery::find($gal_id);
        $gallery->gallery_name =  $gal_text;
        $gallery->save();
    }
    public function delete_gallery(Request $request){
        $gal_id = $request->gal_id;
        $gallery = Gallery::find($gal_id);
        unlink('public/upload/gallery/'.$gallery->gallery_image);
        $gallery->delete();
    }

    public function update_image_gal(Request $request){
        $get_image = $request->file('file');
        $gal_id = $request->gal_id;
        if($get_image){
                $get_name_image = $get_image->getClientOriginalName();
                // phan tach chuoi sau dau cham cua anh
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('public/upload/gallery', $new_image);
                $gallery = Gallery::find($gal_id);
                unlink('public/upload/gallery/'.$gallery->gallery_image);
                $gallery->gallery_image =  $new_image;
                $gallery->save();
         }
    }

}
