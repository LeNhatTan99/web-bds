<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(7);
        return view('layouts.posts.index',['posts'=>$posts]);
    }

    public function create()
    {
        $categories = Category::get();
        return view('layouts.posts.create',['categories'=>$categories]);
    }

    protected function storeImage(Request $request) {
        $path = $request->file('thumbnail')->storeAs('public/post_images',Str::slug($request->name).'.'.'jpg');
        return substr($path, strlen('public/'));
      }

    public function store(Request $request)
    {
        $imgUrl = $this->storeImage($request);
        $data = [
            'user_id'=>auth()->user()->id,
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'content'=>$request->content,
            'thumbnail'=>$imgUrl,
        ];
        DB::beginTransaction();
        try{
            $post = Post::create($data);
            $post->categories()->sync($request->categoryIds);
            $fileName = $request->file('thumbnail')->storeAs('post_images', Str::slug($request->name).'.'.'jpg');
            DB::commit();
            return redirect()->route('posts.index')->with('success','Thêm bài viết thành công');
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('error','Thêm bài viết thất bại');
        }
    }

    public function show(Post $post)
    {
        $categories = Category::get();
        return view('layouts.posts.show',['post'=>$post,'categories'=>$categories]);
    }

    public function edit(Post $post)
    {
        $categories = Category::get();
        return view('layouts.posts.edit',['post'=>$post,'categories'=>$categories]);
    }

    public function update(Request $request, Post $post)
    {
        $imgUrl = $this->storeImage($request);
        $data = [
            'user_id'=>auth()->user()->id,
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'content'=>$request->content,
            'thumbnail'=>$imgUrl,
        ];
        DB::beginTransaction();
        try{
            $post->update($data);
            $post->categories()->sync($request->categoryIds);
            $fileName = $request->file('thumbnail')->storeAs('post_images', Str::slug($request->name).'.'.'jpg');
            DB::commit();
            return redirect()->route('posts.index')->with('success','Cập nhật bài viết thành công');
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('error','Cập nhật bài viết thất bại');
        }
    }

    public function destroy(Post $post)
    {
        try{
            $post->delete();
            return redirect()->route('posts.index')->with('success','Xoá bài viết thành công');
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('error','Xoá bài viết thất bại');
        }
    }
}
