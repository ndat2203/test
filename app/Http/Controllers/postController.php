<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoryPost;
use App\Models\Post;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class postController extends Controller
{
    public function authLogin() {
        $admin_id = session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_post(){
        $this->authLogin();
        $cate_post = categoryPost::orderBy('cate_post_id','desc')->get();

        return View('admin.post.add_post')->with(compact('cate_post'));
    }
    public function save_post(Request $request){
        $data = $request->all();
        $Post = new Post;
        $Post->post_title = $data['post_title'];
        $Post->post_slug = $data['post_slug'];
        $Post->post_desc = $data['post_desc'];
        $Post->post_content = $data['post_content'];
        $Post->post_status = $data['post_status'];
        $Post->cate_post_id = $data['cate_post_id'];
        $get_image = $request->file('post_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/post', $new_image);
            $Post->post_image = $new_image;
        }else{
            $Post->post_image = '';
        }
        $Post->save();
        toastr()->success('Thêm bài viết thành công');
        return Redirect('all-post');
    }

    public function all_post(){
        $this->authLogin();
        $posts = Post::with('category')->orderBy('post_id', 'desc')->get();
        return View('admin.post.all_post')->with(compact('posts'));
    }

    public function edit_post($post_id){
        $this->authLogin();
        $post = Post::findOrFail($post_id);
        $cate_post = categoryPost::orderBy('cate_post_id','desc')->get();
        return View('admin.post.edit_post')->with(compact('post','cate_post'));
    }
    public function update_post(Request $request, $post_id){
        $data = $request->all();

        // Tìm bài viết
        $post_update = Post::find($post_id);
        if (!$post_update) {
            toastr()->error('Không tìm thấy bài viết');
            return Redirect::to('all-post');
        }

        // Gán dữ liệu cơ bản
        $post_update->post_title = $data['post_title'];
        $post_update->post_slug = $data['post_slug'];
        $post_update->post_desc = $data['post_desc'];
        $post_update->post_content = $data['post_content'];
        $post_update->cate_post_id = $data['cate_post_id'];
        // Xử lý hình ảnh (nếu có upload mới)
        $get_image = $request->file('post_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            // Xóa ảnh cũ nếu tồn tại
            $old_image = 'public/upload/post/'.$post_update->post_image;
            if(file_exists($old_image) && $post_update->post_image){
                unlink($old_image);
            }
            // Lưu ảnh mới
            $get_image->move('public/upload/post', $new_image);
            $post_update->post_image = $new_image;
        }

        $post_update->save();
        toastr()->success('Cập nhật bài viết thành công');
        return Redirect::to('all-post');
    }

    public function unactive_post($post_id){
        $this->authLogin();
        $post = Post::where('post_id', $post_id)->first();
        if ($post) {
            $post->update(['post_status' => 1]);
            $post->save();
            toastr()->success('Hiển thị bài viết thành công');
        }

        return Redirect::to('all-post');
    }
    public function active_post($post_id){
        $this->authLogin();
        $post = Post::where('post_id', $post_id)->first();
        if ($post) {
            $post->update(['post_status' => 0]);
            $post->save();
            toastr()->success('Ẩn bài viết thành công');
        }
        return Redirect::to('all-post');
    }
    public function delete_post($post_id){
        $this->authLogin();
        $post = Post::find($post_id);
        $post->delete();
        toastr()->success('Xóa bài viết thành công');
        return Redirect::to('all-post');
    }

    public function bai_viet(Request $request,$post_slug){
        $posts = Post::with('category')->where('post_status','1')->where('post_slug', $post_slug)->take(1)->get();
        $category_post_get = categoryPost::withCount('posts')->orderby('cate_post_id','desc')->where('cate_post_status','1')->get();
        foreach($posts as $key => $val){
            $meta_desc = $val->post_desc;
            $meta_keywords = $val->post_title;
            $meta_title = $val->post_title ;
            $cate_id = $val->cate_post_id;
            $url_canonical = $request->url();
            $cate_post_id = $val->cate_post_id;
            $post_id = $val->post_id;
        }
        //update post_view
        $post_view = Post::where('post_id',$post_id)->first();
        $post_view->post_view = $post_view->post_view + 1;
        $post_view->save();

        $category_post = categoryPost::take(1)->get();
        $related = Post::with('category')->where('post_status','1')->where('cate_post_id', $cate_post_id)->whereNotIn('post_slug', [$post_slug])->take(5)->get();
        return view('pages.post.post_detail')->with('meta_desc',$meta_desc)
                                                ->with('meta_keywords',$meta_keywords)
                                                ->with('meta_title',$meta_title)
                                                ->with('url_canonical',$url_canonical)
                                                ->with('posts',$posts)
                                                ->with('category_post',$category_post)
                                                ->with('related',$related)
                                                ->with('category_post_get',$category_post_get);
    }

}
