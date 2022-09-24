<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Permission::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::paginate(7);
        return view('layouts.permissions.index',['permissions'=>$permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.permissions.create');
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
        'permission_name'=>$request->permission_name,
        'description'=>$request->description,
       ];
       DB::beginTransaction();
       try{
        $permission = Permission::create($data);
        DB::commit();
        return redirect()->route('permissions.index')->with('success','Đã tạo thêm quyền thành công');
       }
       catch(\Exception $e){
        Log::error($e->getMessage());
        DB::rollBack();
        return back()->with('error','Tạo thêm quyền thất bại');
       }
    }

    public function show(Permission $permission)
    {
        return view('layouts.permissions.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
       return view('layouts.permissions.edit',['permission'=>$permission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $data = [
            'permission_name'=>$request->permission_name,
            'description'=>$request->description,
           ];
           DB::beginTransaction();
           try{
            $permission->update($data);
            DB::commit();
            return redirect()->route('permissions.index')->with('success','Cập nhật quyền thành công');
           }
           catch(\Exception $e){
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('error','Cập nhật quyền thất bại');
           }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        DB::beginTransaction();
        try{
         $permission->delete();
         DB::commit();
         return redirect()->route('permissions.index')->with('success','Xoá quyền thành công');
        }
        catch(\Exception $e){
         Log::error($e->getMessage());
         DB::rollBack();
         return back()->with('error','Xoá quyền thất bại');
        }
    }
}
