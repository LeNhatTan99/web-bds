<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $roles = Role::paginate(7);
         return view('layouts.roles.index',['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('layouts.roles.create',['permissions'=>$permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=[
            'role_name'=>$request->role_name,
            'description'=>$request->description,
        ];
        DB::beginTransaction();
        try{
            $role = Role::create($data);
            $role->permissions()->sync($request->permissionIds);
            DB::commit();
            return redirect()->route('roles.index')->with('success','Tạo vai trò thành công');
        } catch(\Exception $e){
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('error','Tạo vai trò thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('layouts.roles.show',['role'=>$role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get();
        return view('layouts.roles.edit',['role'=>$role, 'permissions'=>$permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $data=[
            'role_name'=>$request->role_name,
            'description'=>$request->description,
        ];
        DB::beginTransaction();
        try{
            $role->update($data);
            $role->permissions()->sync($request->permissionIds);
            DB::commit();
            return redirect()->route('roles.index')->with('success','Chỉnh sửa vai trò thành công');
        } catch(\Exception $e){
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('error','Chỉnh sửa vai trò thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        DB::beginTransaction();
        try{
            $role->delete();
            DB::commit();
            return redirect()->route('roles.index')->with('success','Xoá vai trò thành công');
        } catch(\Exception $e){
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('error','Xoá vai trò thất bại');
        }
    }
}
