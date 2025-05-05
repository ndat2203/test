<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoryPost;
use App\Models\Slider;
use App\Models\Post;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class categoryPostController extends Controller
{
    public function authLogin() {
        $admin_id = session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_post(){
        $this->authLogin();
        return View('admin.categoryPost.add_category_post');
    }
    public function save_category_post(Request $request){
        $data = $request->all();
        $categoryPost = new categoryPost;
        $categoryPost->cate_post_name = $data['cate_post_name'];
        $categoryPost->cate_post_slug = $data['cate_post_slug'];
        $categoryPost->cate_post_desc = $data['cate_post_desc'];
        $categoryPost->cate_post_status = $data['cate_post_status'];

        $categoryPost->save();
        toastr()->success('Thêm danh mục bài viết thành công');
        return Redirect('all-category-post');
    }

    public function unactive_category_post($cate_post_slug){
        $this->authLogin();
        $categoryPost = categoryPost::where('cate_post_slug', $cate_post_slug)->first();
        if ($categoryPost) {
            $categoryPost->update(['cate_post_status' => 1]);
            $categoryPost->save();
            toastr()->success('Hiển thị danh mục bài viết thành công');
        }

        return Redirect::to('all-category-post');
    }
    public function active_category_post($cate_post_slug){
        $this->authLogin();
        $categoryPost = categoryPost::where('cate_post_slug', $cate_post_slug)->first();
        if ($categoryPost) {
            $categoryPost->update(['cate_post_status' => 0]);
            $categoryPost->save();
            toastr()->success('Ẩn danh mục bài viết thành công');
        }
        return Redirect::to('all-category-post');
    }
    public function edit_category_post($cate_post_id){
        $this->authLogin();
        $categoryPost = categoryPost::find($cate_post_id);
        return View('admin.categoryPost.edit_category_post')->with(compact('categoryPost'));
    }
    public function update_category_post(Request $request, $cate_post_id){
        $data = $request->all();
        $cate_update = categoryPost::find($cate_post_id);
        $cate_update->cate_post_name = $data['cate_post_name'];
        $cate_update->cate_post_slug = $data['cate_post_slug'];
        $cate_update->cate_post_desc = $data['cate_post_desc'];
        $cate_update->save();
        toastr()->success('Cập nhật danh mục bài viết thành công');
        return Redirect::to('all-category-post');
    }

    public function all_category_post(){
        $this->authLogin();
        $categoryPost = categoryPost::orderby('cate_post_id','desc')->get();
        return View('admin.categoryPost.all_category_post')->with(compact('categoryPost'));
    }
    public function delete_category_post($cate_post_id){
        $this->authLogin();
        $categoryPost = categoryPost::find($cate_post_id);
        $categoryPost->delete();
        toastr()->success('Xóa danh mục bài viết thành công');
        return Redirect::to('all-category-post');
    }
    public function danh_muc_bai_viet(Request $request, $cate_post_slug){
        $cate_post = categoryPost::orderby('cate_post_id','desc')->get();

        $cate_post_name = categoryPost::where('cate_post_slug', $cate_post_slug)->first();
        $category_post_get = categoryPost::withCount('posts')->orderby('cate_post_id','desc')->where('cate_post_status','1')->get();
        $category_post = categoryPost::where('cate_post_slug',$cate_post_slug)->get();
        foreach($category_post as $key => $val){
            $meta_desc = $val->cate_post_desc;
            $meta_keywords = $val->cate_post_name;
            $meta_title = $val->cate_post_name ;
            $cate_id = $val->cate_post_id;
            $url_canonical = $request->url();
        }
        $latest_posts = Post::orderBy('post_id', 'desc')->take(3)->get();
        $posts = Post::with('category')->where('post_status','1')->where('cate_post_id', $cate_id)->paginate(4);
        return view('pages.post.category_posts')->with('meta_desc',$meta_desc)
                                                ->with('meta_keywords',$meta_keywords)
                                                ->with('meta_title',$meta_title)
                                                ->with('url_canonical',$url_canonical)
                                                ->with('category_post',$category_post)
                                                ->with('category_post_get',$category_post_get)
                                                ->with('posts',$posts)
                                                ->with('latest_posts',$latest_posts)
                                                ->with('cate_post',$cate_post)
                                                ->with('cate_post_name',$cate_post_name);
    }
}
