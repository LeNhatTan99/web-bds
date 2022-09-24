<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Category::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(7);
        return view('layouts.categories.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            "category_name"=>$request->category_name,
            "description"=>$request->description,
            'slug' => Str::slug($request->category_name),
        ];
        DB::beginTransaction();
        try{
            $category = Category::create($data);
            DB::commit();
            return redirect()->route('categories.index')->with('success',"Tạo danh mục thành công");
        } catch(\Exception $e)
        {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('error',"Tạo danh mục thất bại");
        }
    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        return view('layouts.categories.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = [
            "category_name"=>$request->category_name,
            "description"=>$request->description,
            'slug' => Str::slug($request->category_name),
        ];
        DB::beginTransaction();
        try{
            $category->update($data);
            DB::commit();
            return redirect()->route('categories.index')->with('success',"Chỉnh sửa danh mục thành công");
        } catch(\Exception $e)
        {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('error',"Chỉnh sửa danh mục thất bại");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        DB::beginTransaction();
        try{
            $category->delete();
            DB::commit();
            return redirect()->route('categories.index')->with('success',"Xoá danh mục thành công");
        } catch(\Exception $e)
        {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('error',"Xoá danh mục thất bại");
        }
    }
}
