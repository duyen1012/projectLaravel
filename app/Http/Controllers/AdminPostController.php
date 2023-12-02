<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    function list(Request $request)
    {
        $status = $request->input("status");
        $list_act = [
            'delete' => 'Xóa tạm thời',
        ];
        if ($status == "trash") {
            $list_act = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn'
            ];
            $posts = Post::onlyTrashed()->paginate(10);
        } else {
            $keyword = "";
            if ($request->input("keyword")) {
                $keyword = $request->input("keyword");
            }
            $posts = Post::where("post_title", "like", "%" . $keyword . "%")->paginate(10);
        }
        $count_post_active = Post::count();
        $count_post_trash = Post::onlyTrashed()->count();
        $count = [$count_post_active, $count_post_trash];
        return view("admin.post.list", compact("posts", "count","list_act"));
    }

    function add(Request $request)
    {
        $post_status = ['0' => 'draft', '1' => 'published', '2' => 'pending', '3' => 'archived'];
        $categories = CategoryPost::all();

        return view("admin.post.add", compact('post_status', 'categories'));
    }

    function store(Request $request)
    {

        $request->validate([
            'post_title' => 'required|string',
            'post_slug' => 'required',
            'post_images' => 'mimetypes:image/jpeg,image/png,image/bmp,image/jpg',
            'post_content' => 'required',
            'post_status' => 'required',
            'category_post_id' => 'required',

        ]);
        $imagePath = $request->file('post_images')->store('post_images', 'public');
        Post::create([
            'post_title' => $request->input('post_title'),
            'post_slug' => $request->input('post_slug'),
            'post_images' => $imagePath,
            'post_content' => $request->input('post_content'),
            'post_status' => $request->input('post_status'),
            'user_id' => Auth::id(),
            'category_post_id' => $request->category_post_id,

        ]);


        return redirect()->route('post.list')->with('status', 'Đã thêm bài viết thành công');
    }

    function edit(Request $request, $post_id)
    {

        $post_status = ['0' => 'draft', '1' => 'published', '2' => 'pending', '3' => 'archived'];
        $post = Post::find($post_id);
        $categories = CategoryPost::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->category_id] = $category->category_name;
        }
        return view('admin.post.edit', compact('post', 'categories', 'cats', 'post_status'));
    }

    function update(Post $post, Request $request)
    {
        dd($request->file('post_images'));
        $request->validate([
            'post_title' => 'required|string',
            'post_slug' => 'required',
            'post_images' => 'mimetypes:image/jpeg,image/png,image/bmp,image/jpg',
            'post_content' => 'required',
            'post_status' => 'required',
            'category_post_id' => 'required',

        ]);
        $imagePath = $request->file('post_images')->store('post_images', 'public');
        $post->update([
            'post_title' => $request->input('post_title'),
            'post_slug' => $request->input('post_slug'),
            'post_images' => $imagePath,
            'post_content' => $request->input('post_content'),
            'post_status' => $request->input('post_status'),
            'user_id' => Auth::id(),
            'category_post_id' => $request->category_post_id,
        ]);
        // return $imagePath;
        return redirect()->route('post.list')->with('status', 'Đã cập nhật bài viết thành công');
    }
    function delete(Request $request , Post $post){
        $post->delete();
        return redirect()->route('post.list')->with('status', 'Đã xóa bài viết thành công');
    }

    function action(Request $request)
    {
        $list_check = $request->input('list_check');
        if (!empty($list_check)) {
            $act = $request->input('act');
            if ($act == 'delete') {
                Post::destroy($list_check);
                return redirect()->route('post.list')->with('status', 'Đã xóa thành công');
            }
            if($act == 'restore'){
                Post::onlyTrashed()->whereIn('post_id', $list_check)->restore();
                return redirect()->route('post.list')->with('status', 'Đã khôi phục thành công');
            }
            if ($act == 'forceDelete') {
                Post::withTrashed()
                    ->whereIn('post_id', $list_check)->forceDelete();
                return redirect('admin/post/list')->with('status', 'Bạn đã xóa vĩnh viễn user');

            }

        }
        return redirect()->route('post.list')->with('status', 'Bạn cần chọn phần tử để thực thi');


    }


}
