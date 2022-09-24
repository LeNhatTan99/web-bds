<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    public function index(){
        $users = User::get();
        return view('layouts.users.index', ['users'=>$users]);
    }

    public function create(){
        $roles = Role::get();
        return view('layouts.users.create',['roles'=>$roles]);
    }

    public function store(Request $request)
    {
        $password = Hash::make($request->password);
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$password,
        ];
        DB::beginTransaction();
        try{
            $user = User::create($data);
            $user->roles()->sync($request->roleId);
            DB::commit();
            return redirect()->route('users.index')->with('success','Tạo tài khoản thành công');
        } catch(\Exception $e){
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('error','Tạo tài khoản thất bại');
        }
    }
    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = Role::get();
        return view('layouts.users.edit',['user'=>$user,'roles'=>$roles]);
    }

    public function update(Request $request, User $user)
    {
        $password = Hash::make($request->password);
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$password,
        ];
        DB::beginTransaction();
        try{
            $user->update($data);
            $user->roles()->sync($request->roleId);
            DB::commit();
            return redirect()->route('users.index')->with('success','Chỉnh sửa tài khoản thành công');
        } catch(\Exception $e){
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('error','Chỉnh sửa tài khoản thất bại');
        }
    }


    public function destroy(User $user)
    {
        DB::beginTransaction();
        try{
            $user->delete();
            DB::commit();
            return redirect()->route('users.index')->with('success','Xoá tài khoản thành công');
        } catch(\Exception $e){
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('error','Xoá tài khoản thất bại');
        }
    }
}
