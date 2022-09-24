<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('layouts.products.index',['products'=>$products]);
    }

    public function create()
    {
        $categories = Category::get();
        return view('layouts.products.create',['categories'=>$categories]);
    }

    protected function storeImage(Request $request) {
        $path = $request->file('thumbnail')->storeAs('public/product_images',Str::slug($request->name).'.'.'jpg');
        return substr($path, strlen('public/'));
      }

    public function store(Request $request)
    {
        $imgUrl = $this->storeImage($request);
        $data = [
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'address'=>$request->address,
            'form'=>$request->form,
            'description'=>$request->description,
            'bedroom'=>$request->bedroom,
            'bathroom'=>$request->bathroom,
            'area'=>$request->area,
            'price'=>$request->price,
            'thumbnail'=>$imgUrl,
        ];
        DB::beginTransaction();
        try{
            $product = Product::create($data);
            $product->categories()->sync($request->categoryIds);
            $fileName = $request->file('thumbnail')->storeAs('product_images', Str::slug($request->name).'.'.'jpg');
            DB::commit();
            return redirect()->route('products.index')->with('success','Thêm sản phẩm thành công');
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('error','Thêm sản phẩm thất bại');
        }
    }

    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('layouts.products.edit',['product'=>$product,'categories'=>$categories]);
    }

    public function update(Request $request, Product $product)
    {
        $imgUrl = $this->storeImage($request);
        $data = [
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'address'=>$request->address,
            'form'=>$request->form,
            'description'=>$request->description,
            'bedroom'=>$request->bedroom,
            'bathroom'=>$request->bathroom,
            'area'=>$request->area,
            'price'=>$request->price,
            'thumbnail'=>$imgUrl,
        ];
        DB::beginTransaction();
        try{
            $product->update($data);
            $product->categories()->sync($request->categoryIds);
            $fileName = $request->file('thumbnail')->storeAs('product_images', $request->name.'.'.'jpg');
            DB::commit();
            return redirect()->route('products.index')->with('success','Cập nhật sản phẩm thành công');
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('error','Cập nhật sản phẩm thất bại');
        }
    }

    public function destroy(Product $product)
    {
        try{
            $product->delete();
            return redirect()->route('products.index')->with('success','Xoá sản phẩm thành công');
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('error','Xoá sản phẩm thất bại');
        }
    }
}
