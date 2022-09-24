<?php

namespace App\Http\Controllers\Public;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;


class PostController extends Controller
{
    public function detailNews(Request $request, $slug) {
        $categories = Category::get();
        $posts=Post::orderBy('created_at','desc')->get();
        $post = Post::where('slug',$slug)->first();
        $comments = Comment::get();
        $viewData = [
            'posts'=>$posts,
            'post'=>$post,
            'comments'=>$comments,
            'categories'=>$categories,
        ];
           return view('frontend.news.detailNews',$viewData);
    }

    public function listNews(Request $request) {
        $posts=Post::orderBy('created_at','desc')->get();
        $categories = Category::get();
        $viewData = [
            'posts'=>$posts,
            'categories'=>$categories,
        ];
           return view('frontend.news.index',$viewData);
    }
}
