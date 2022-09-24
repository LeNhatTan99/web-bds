<?php

namespace App\Http\Controllers\Public;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    public function detailProduct($slug,Request $request)
    {
        $categories = Category::get();
        $product = Product::where('slug',$slug)->first();
        $viewData = [
            'product'=>$product,
            'categories'=>$categories,
        ];
        return view('frontend.products.detail',$viewData);
    }

    public function allProduct()
    {
        $products = Product::get()->groupBy('form');
        $categories = Category::get();
        $viewData = [
            'products'=> $products,
            'categories'=> $categories,
        ];
        return view('frontend.products.allproduct',$viewData);
    }
}
