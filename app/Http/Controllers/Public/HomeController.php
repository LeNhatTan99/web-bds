<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        $products = Product::get()->groupBy('form');
        $categories = Category::get();
        $comments = Comment::get();
        $viewData = [
            'posts'=> $posts,
            'products'=> $products,
            'categories'=> $categories,
            'comments'=> $comments ,
        ];
        return view('frontend.index',$viewData);
    }


    public function Search(Request $request)
    {
        $categories = Category::get();
        $searchWord = $request->searchWord;
        $price = $request->price;
        $address = $request->address;
        $area = $request->area;

        $products = Product::when($area, function ($query, $area) {
            return $query->whereBetween('area', [0, $area]);
        })->when($price, function ($query, $price) {
            return $query->whereBetween('price', [0, $price]);
        })-> when($address, function ($query, $address) {
            return $query->where('address','like', "%{$address}%");
        }) -> when($searchWord, function ($query, $searchWord) {
        return $query->where('name', 'like', "%{$searchWord}%");
        })->orderBy('created_at')->get()->groupBy('form');
        return view('frontend.search', compact('products','searchWord','categories'));
    }


}
