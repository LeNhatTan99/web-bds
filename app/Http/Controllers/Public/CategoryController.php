<?php

namespace App\Http\Controllers\Public;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{

   public function getListProduct($slug)
   {
    $categories = Category::get();
    $col = ['products.*', DB::raw('categories.slug as category_slug, category_name')];
    $products = Product::join('category_product', 'products.id', '=', 'category_product.product_id' )
            ->join('categories', 'category_product.category_id', '=', 'categories.id')
            ->where('categories.slug', $slug)
            ->orderBy('products.form', 'asc')
            ->get($col);
    $viewable = Category::VIEWABLE;
    $viewData =  [
        'categories'=>$categories,
        'products' => $products->groupBy('form')
        ];

    return view("frontend.categories.{$viewable[$slug]}",$viewData);
   }

}
